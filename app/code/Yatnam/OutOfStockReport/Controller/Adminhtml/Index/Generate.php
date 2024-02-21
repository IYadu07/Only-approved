<?php

namespace Yatnam\OutOfStockReport\Controller\Adminhtml\Index;

use Magento\Framework\App\Action\Action;
use Magento\Framework\App\Action\Context;
use Magento\Catalog\Api\ProductRepositoryInterface;
use Magento\Catalog\Model\ResourceModel\Product\CollectionFactory as ProductCollectionFactory;
use Magento\CatalogInventory\Api\StockRegistryInterface;
use Magento\Framework\App\Response\Http\FileFactory;
use Magento\Catalog\Model\Product\Attribute\Source\Status;

class Generate extends Action
{
    protected $productRepository;
    protected $productCollectionFactory;
    protected $stockRegistry;
    protected $csvProcessor;
    protected $fileFactory;
    protected $productStatus;

    public function __construct(
        Context $context,
        ProductRepositoryInterface $productRepository,
        ProductCollectionFactory $productCollectionFactory,
        StockRegistryInterface $stockRegistry,
        \Magento\Framework\File\Csv $csvProcessor,
        FileFactory $fileFactory,
        Status $productStatus
    ) {
        parent::__construct($context);
        $this->productRepository = $productRepository;
        $this->productCollectionFactory = $productCollectionFactory;
        $this->stockRegistry = $stockRegistry;
        $this->csvProcessor = $csvProcessor;
        $this->fileFactory = $fileFactory;
        $this->productStatus = $productStatus;
    }

    public function execute()
    {
        // Get all products
        $productCollection = $this->productCollectionFactory->create();
        $productCollection->addAttributeToSelect(['entity_id', 'name']);
        $productCollection->addAttributeToFilter('status', \Magento\Catalog\Model\Product\Attribute\Source\Status::STATUS_ENABLED);

        // CSV data array
        $csvData = [];

        foreach ($productCollection as $product) {
            $productId = $product->getId();
            $productName = $product->getName();
            $stockItem = $this->stockRegistry->getStockItem($productId);
            $isInStock = $stockItem->getIsInStock();
            $qty = (float)$stockItem->getQty();
            if (!$isInStock || $qty <= 0) {
                // Add product data to CSV data array
                $csvData[] = [$productId, $productName];
            }
        }

        // Prepare CSV content
        $csvContent = [];
        foreach ($csvData as $rowData) {
            $csvContent[] = implode(',', $rowData);
        }
        $csvContent = implode("\n", $csvContent);

        // Set headers for file download
        $fileName = 'out_of_stock_products.csv';
        $this->fileFactory->create(
            $fileName,
            $csvContent,
            \Magento\Framework\App\Filesystem\DirectoryList::VAR_DIR,
            'text/csv'
        );
    }
}
