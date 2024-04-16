<?php

namespace Yatnam\CustomBanner\Block;

use Magento\Framework\View\Element\Template;
use Magento\Framework\View\Element\Template\Context;
use Magento\Store\Model\StoreManagerInterface;
use Magento\Catalog\Model\CategoryFactory;
use Psr\Log\LoggerInterface;

class Banner extends Template
{
    protected $_storeManager;
    protected $_categoryFactory;
    protected $logger;

    public function __construct(
        Context $context,
        StoreManagerInterface $storeManager,
        CategoryFactory $categoryFactory,
        LoggerInterface $logger,
        array $data = []
    ) {
        $this->_storeManager = $storeManager;
        $this->_categoryFactory = $categoryFactory;
        $this->logger = $logger;
        parent::__construct($context, $data);
    }

    public function getBannerImageUrl()
    {
        $categoryId = 4;
        $this->logger->info("Fetching image for category ID: " . $categoryId);

        $category = $this->_categoryFactory->create()->load($categoryId);
        $categoryData = $category->getData();
        $this->logger->info("Category Data: " . print_r($categoryData, true));

        $imageName = $category->getData('category_banner_image');
        $this->logger->info("Image Name: " . $imageName);

        if ($imageName) {
            $mediaUrl = $this->_storeManager->getStore()->getBaseUrl(\Magento\Framework\UrlInterface::URL_TYPE_MEDIA);
            // Remove additional '/media/' before 'catalog'
            $imageUrl = rtrim($mediaUrl, '/media/') . $imageName;
            $this->logger->info("Constructed Image URL: " . $imageUrl);
            return $imageUrl;
        }

        return false;
    }
}
