<?php

/**
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */

namespace Yatnam\CustomCompare\Controller\Product\Compare;

use Magento\Catalog\Model\Product\Attribute\Source\Status;
use Magento\Framework\App\Action\HttpPostActionInterface as HttpPostActionInterface;
use Magento\Framework\Exception\NoSuchEntityException;
use Magento\Framework\Stdlib\CookieManagerInterface;
use Magento\Framework\Stdlib\Cookie\CookieMetadataFactory;
use Psr\Log\LoggerInterface;
use Magento\Framework\App\Action\Context;
use Magento\Catalog\Api\ProductRepositoryInterface;
use Magento\Catalog\ViewModel\Product\Checker\AddToCompareAvailability;
use Magento\Framework\Data\Form\FormKey\Validator;
use Magento\Framework\View\Result\PageFactory;
use Magento\Framework\Controller\Result\JsonFactory;

/**
 * Remove item from compare list action.
 */
class Remove extends \Magento\Catalog\Controller\Product\Compare implements HttpPostActionInterface
{
    /**
     * @var CookieManagerInterface
     */
    private $cookieManager;

    /**
     * @var CookieMetadataFactory
     */
    private $cookieMetadataFactory;

    /**
     * @var LoggerInterface
     */
    private $logger;

    /**
     * @var JsonFactory
     */
    protected $resultJsonFactory;

    /**
     * Remove item from compare list.
     *
     * @SuppressWarnings(PHPMD.CyclomaticComplexity)
     * @return \Magento\Framework\Controller\ResultInterface
     */
    public function __construct(
        Context $context,
        CookieManagerInterface $cookieManager,
        CookieMetadataFactory $cookieMetadataFactory,
        LoggerInterface $logger,
        ProductRepositoryInterface $productRepository,
        AddToCompareAvailability $compareAvailability,
        Validator $formKeyValidator,
        PageFactory $resultPageFactory,
        \Magento\Catalog\Model\Product\Compare\ItemFactory $compareItemFactory,
        \Magento\Catalog\Model\ResourceModel\Product\Compare\Item\CollectionFactory $itemCollectionFactory,
        \Magento\Customer\Model\Session $customerSession,
        \Magento\Customer\Model\Visitor $customerVisitor,
        \Magento\Catalog\Model\Product\Compare\ListCompare $catalogProductCompareList,
        \Magento\Catalog\Model\Session $catalogSession,
        \Magento\Store\Model\StoreManagerInterface $storeManager,
        JsonFactory $resultJsonFactory
    ) {
        parent::__construct(
            $context,
            $compareItemFactory,
            $itemCollectionFactory,
            $customerSession,
            $customerVisitor,
            $catalogProductCompareList,
            $catalogSession,
            $storeManager,
            $formKeyValidator,
            $resultPageFactory,
            $productRepository,
            $compareAvailability
        );

        $this->cookieManager = $cookieManager;
        $this->cookieMetadataFactory = $cookieMetadataFactory;
        $this->logger = $logger;
        $this->resultJsonFactory = $resultJsonFactory;
    }


    public function execute()
    {
        $productId = (int)$this->getRequest()->getParam('product');
        if ($this->_formKeyValidator->validate($this->getRequest()) && $productId) {
            $storeId = $this->_storeManager->getStore()->getId();
            try {
                /** @var \Magento\Catalog\Model\Product $product */
                $product = $this->productRepository->getById($productId, false, $storeId);
            } catch (NoSuchEntityException $e) {
                $product = null;
            }

            if ($product && (int)$product->getStatus() !== Status::STATUS_DISABLED) {
                /** @var $item \Magento\Catalog\Model\Product\Compare\Item */
                $item = $this->_compareItemFactory->create();
                if ($this->_customerSession->isLoggedIn()) {
                    $item->setCustomerId($this->_customerSession->getCustomerId());
                } elseif ($this->_customerId) {
                    $item->setCustomerId($this->_customerId);
                } else {
                    $item->addVisitorId($this->_customerVisitor->getId());
                }

                $item->loadByProduct($product);
                /** @var $helper \Magento\Catalog\Helper\Product\Compare */
                $helper = $this->_objectManager->get(\Magento\Catalog\Helper\Product\Compare::class);
                if ($item->getId()) {
                    $item->delete();
                    $result = $this->removeProductFromCookie($productId);
                    $productName = $this->_objectManager->get(\Magento\Framework\Escaper::class)
                        ->escapeHtml($product->getName());
                    $this->messageManager->addSuccessMessage(
                        __('You removed product %1 from the comparison list.', $productName)
                    );
                    $this->_eventManager->dispatch(
                        'catalog_product_compare_remove_product',
                        ['product' => $item]
                    );
                    $helper->calculate();
                    $resultJson = $this->resultJsonFactory->create();
                    return $resultJson->setData($result);
                }
            }
        }

        if (!$this->getRequest()->getParam('isAjax', false)) {
            $resultRedirect = $this->resultRedirectFactory->create();

            return $resultRedirect->setRefererOrBaseUrl();
        }
    }

    private function removeProductFromCookie($productId)
    {
        try {
            // Retrieve existing product data array from the cookie
            $existingProductData = $this->cookieManager->getCookie('product_data_cookie');

            if ($existingProductData) {
                // Decode the existing product data array
                $productDataArray = json_decode($existingProductData, true);

                // Check if JSON decoding was successful
                if ($productDataArray !== null) {
                    // Check if the product with the given ID exists in the array
                    if (isset($productDataArray[$productId])) {
                        // Remove the product from the array
                        unset($productDataArray[$productId]);

                        // Serialize the updated array
                        $serializedProductData = json_encode($productDataArray);

                        // Update the cookie with the modified product data
                        $productCookieMetadata = $this->cookieMetadataFactory->createPublicCookieMetadata();
                        $productCookieMetadata->setDurationOneYear();
                        $productCookieMetadata->setPath('/');
                        $productCookieMetadata->setHttpOnly(false);
                        $this->cookieManager->setPublicCookie(
                            'product_data_cookie',
                            $serializedProductData,
                            $productCookieMetadata
                        );
                        $response = [
                            'success' => true,
                            'message' => 'Product removed successfully.'
                        ];
                        $this->logger->info('Product with ID ' . $productId . ' is successfully removed from the cookie.');
                        return $response;
                    } else {
                        $response = [
                            'success' => false,
                            'message' => 'Product with ID ' . $productId . ' does not exist in the cookie.'
                        ];
                        $this->logger->info('Product with ID ' . $productId . ' does not exist in the cookie.');
                        return $response;
                    }
                } else {
                    $response = [
                        'success' => false,
                        'message' => 'Failed to decode existing product data from the cookie.'
                    ];
                    $this->logger->error('Failed to decode existing product data from the cookie.');
                    return $response;
                }
            } else {
                $response = [
                    'success' => false,
                    'message' => 'No product data found in the cookie.'
                ];
                $this->logger->info('No product data found in the cookie.');
                return $response;
            }
        } catch (NoSuchEntityException $e) {
            $this->logger->error('Failed to remove product with ID: ' . $productId);
            $this->logger->error($e->getMessage());
        }
    }
}
