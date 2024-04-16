<?php

/**
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */

namespace Yatnam\CustomCompare\Controller\Product\Compare;

use Magento\Catalog\Api\ProductRepositoryInterface;
use Magento\Catalog\ViewModel\Product\Checker\AddToCompareAvailability;
use Magento\Framework\App\Action\HttpPostActionInterface as HttpPostActionInterface;
use Magento\Framework\Data\Form\FormKey\Validator;
use Magento\Framework\Exception\NoSuchEntityException;
use Magento\Framework\View\Result\PageFactory;
use Magento\Framework\Stdlib\CookieManagerInterface;
use Magento\Framework\Stdlib\Cookie\CookieMetadataFactory;
use Psr\Log\LoggerInterface; // Include PSR Logger interface

/**
 * Add item to compare list action.
 */
class Add extends \Magento\Catalog\Controller\Product\Compare implements HttpPostActionInterface
{
    /**
     * @var AddToCompareAvailability
     */
    private $compareAvailability;

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
     * @param \Magento\Framework\App\Action\Context $context
     * @param \Magento\Catalog\Model\Product\Compare\ItemFactory $compareItemFactory
     * @param \Magento\Catalog\Model\ResourceModel\Product\Compare\Item\CollectionFactory $itemCollectionFactory
     * @param \Magento\Customer\Model\Session $customerSession
     * @param \Magento\Customer\Model\Visitor $customerVisitor
     * @param \Magento\Catalog\Model\Product\Compare\ListCompare $catalogProductCompareList
     * @param \Magento\Catalog\Model\Session $catalogSession
     * @param \Magento\Store\Model\StoreManagerInterface $storeManager
     * @param Validator $formKeyValidator
     * @param PageFactory $resultPageFactory
     * @param ProductRepositoryInterface $productRepository
     * @param AddToCompareAvailability|null $compareAvailability
     * @param CookieManagerInterface $cookieManager
     * @param CookieMetadataFactory $cookieMetadataFactory
     * @param LoggerInterface $logger
     * @SuppressWarnings(PHPMD.ExcessiveParameterList)
     */
    public function __construct(
        \Magento\Framework\App\Action\Context $context,
        \Magento\Catalog\Model\Product\Compare\ItemFactory $compareItemFactory,
        \Magento\Catalog\Model\ResourceModel\Product\Compare\Item\CollectionFactory $itemCollectionFactory,
        \Magento\Customer\Model\Session $customerSession,
        \Magento\Customer\Model\Visitor $customerVisitor,
        \Magento\Catalog\Model\Product\Compare\ListCompare $catalogProductCompareList,
        \Magento\Catalog\Model\Session $catalogSession,
        \Magento\Store\Model\StoreManagerInterface $storeManager,
        Validator $formKeyValidator,
        PageFactory $resultPageFactory,
        ProductRepositoryInterface $productRepository,
        AddToCompareAvailability $compareAvailability = null,
        CookieManagerInterface $cookieManager,
        CookieMetadataFactory $cookieMetadataFactory,
        LoggerInterface $logger // Inject PSR Logger interface
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
            $productRepository
        );

        $this->compareAvailability = $compareAvailability
            ?: $this->_objectManager->get(AddToCompareAvailability::class);

        $this->cookieManager = $cookieManager;
        $this->cookieMetadataFactory = $cookieMetadataFactory;
        $this->logger = $logger; // Assign logger instance
    }

    /**
     * Add item to compare list.
     *
     * @return \Magento\Framework\Controller\ResultInterface
     */
    public function execute()
    {
        $this->logger->info('Reached controller');
        $resultRedirect = $this->resultRedirectFactory->create();
        if (!$this->_formKeyValidator->validate($this->getRequest())) {
            return $resultRedirect->setRefererUrl();
        }

        $productId = (int)$this->getRequest()->getParam('product');
        $this->logger->info('product id by sanju' . $productId);
        if ($productId && ($this->_customerVisitor->getId() || $this->_customerSession->isLoggedIn())) {
            $storeId = $this->_storeManager->getStore()->getId();
            try {
                /** @var \Magento\Catalog\Model\Product $product */
                $product = $this->productRepository->getById($productId, false, $storeId);
            } catch (NoSuchEntityException $e) {
                $product = null;
            }

            if ($product && $this->compareAvailability->isAvailableForCompare($product)) {
                $this->_catalogProductCompareList->addProduct($product);
                $productName = $this->_objectManager->get(
                    \Magento\Framework\Escaper::class
                )->escapeHtml($product->getName());
                $this->messageManager->addComplexSuccessMessage(
                    'addCompareSuccessMessage',
                    [
                        'product_name' => $productName,
                        'compare_list_url' => $this->_url->getUrl('catalog/product_compare'),
                    ]
                );

                $this->_eventManager->dispatch('catalog_product_compare_add_product', ['product' => $product]);

                $this->logger->info('Condtion satisfied');
                // Set product name cookie
                $this->setProductCookie($productId);
            } else {
                $this->logger->info('Failed to add product to compare list: Product is not available for comparison.');
            }

            $this->_objectManager->get(\Magento\Catalog\Helper\Product\Compare::class)->calculate();
        } else {
            $this->logger->info('Failed to add product to compare list: Invalid product ID or user session.');
        }

        return $resultRedirect->setRefererOrBaseUrl();
    }

    private function setProductCookie($productId)
    {
        try {
            // Load product by ID
            $product = $this->productRepository->getById($productId);
            $productName = $product->getName();
            $productPrice = $product->getPrice(); // Get product price
            $productImageUrl = $this->_storeManager->getStore()->getBaseUrl(\Magento\Framework\UrlInterface::URL_TYPE_MEDIA) . 'catalog/product' . $product->getImage(); // Get product image URL

            $this->logger->info('Product ID: ' . $productId);
            $this->logger->info('Product Name: ' . $productName);
            $this->logger->info('Product Price: ' . $productPrice);
            $this->logger->info('Product Image URL: ' . $productImageUrl);

            // Retrieve existing product data array from the cookie, or initialize an empty array if none exists
            $existingProductData = $this->cookieManager->getCookie('product_data_cookie');
            $productDataArray = $existingProductData ? json_decode($existingProductData, true) : [];

            // Add or update product data in the array
            $productDataArray[$productId] = [
                'name' => $productName,
                'price' => $productPrice,
                'image_url' => $productImageUrl
            ];

            // Serialize the array to store in the cookie
            $serializedProductData = json_encode($productDataArray);

            $productCookieMetadata = $this->cookieMetadataFactory->createPublicCookieMetadata();
            // Adjust the cookie duration, path, and other properties as needed
            $productCookieMetadata->setDurationOneYear();
            $productCookieMetadata->setPath('/');
            $productCookieMetadata->setHttpOnly(false);

            // Set the updated product data string as the value of the cookie
            $this->cookieManager->setPublicCookie(
                'product_data_cookie',
                $serializedProductData,
                $productCookieMetadata
            );

            $this->logger->info('Product data cookie is successfully set.');
        } catch (NoSuchEntityException $e) {
            $this->logger->error('Failed to load product with ID: ' . $productId);
            $this->logger->error($e->getMessage());
        }
    }
}
