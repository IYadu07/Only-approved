<?php

namespace Yatnam\CustomProducts\Block;

use Magento\Catalog\Helper\Image as ImageHelper;
use Magento\Catalog\Model\ResourceModel\Product\CollectionFactory;
use Magento\Framework\View\Element\Template;

class ProductList extends Template
{
    protected $productCollectionFactory;
    protected $imageHelper;

    public function __construct(
        Template\Context $context,
        CollectionFactory $productCollectionFactory,
        ImageHelper $imageHelper,
        array $data = []
    ) {
        $this->productCollectionFactory = $productCollectionFactory;
        $this->imageHelper = $imageHelper;
        parent::__construct($context, $data);
    }

    public function getProductCollection()
    {
        $categoryId = 4;
        $collection = $this->productCollectionFactory->create();
        $collection->addAttributeToSelect('*')
            ->addCategoriesFilter(['eq' => $categoryId])
            ->setOrder('entity_id', 'DESC');
        return $collection;
    }

    public function getImageHelper()
    {
        return $this->imageHelper;
    }
}
