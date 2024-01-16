<?php
namespace Magento\OnlyApproved\MagentoTheme\Block;

use Magento\Catalog\Model\AbstractModel;
use Magento\Framework\Api\ExtensionAttributesFactory;
use Magento\Catalog\Api\Data\CategoryInterface;
use Magento\Catalog\Api\Data\CategoryTreeInterface;
use Magento\Framework\Filter\FilterManager;
use Magento\Framework\Indexer\IndexerRegistry;
use Magento\Catalog\Model\Indexer\Category\Flat\State as FlatState;
use Magento\Catalog\Model\ResourceModel\Category\TreeFactory;
use Magento\CatalogUrlRewrite\Model\CategoryUrlPathGenerator;
use Magento\Framework\UrlFinderInterface;
use Magento\Store\Model\ResourceModel\Store\CollectionFactory;
use Magento\Store\Model\StoreManagerInterface;
use Magento\Catalog\Model\Config;
use Magento\Catalog\Model\ResourceModel\Product\CollectionFactory;

class ProductList extends AbstractModel implements
    CategoryInterface,
    CategoryTreeInterface
{
    protected $metadataService;
    protected $_treeModel;
    protected $_categoryTreeFactory;
    protected $_storeCollectionFactory;
    protected $_url;
    protected $_productCollectionFactory;
    protected $_catalogConfig;
    protected $filter;
    protected $flatState;
    protected $categoryUrlPathGenerator;
    protected $urlFinder;
    protected $indexerRegistry;
    protected $categoryRepository;

    public function __construct(
        \Magento\Framework\Model\Context $context,
        \Magento\Framework\Registry $registry,
        \Magento\Framework\Api\ExtensionAttributesFactory $extensionFactory,
        \Magento\Catalog\Model\Attribute\Value $customAttributeFactory,
        \Magento\Store\Model\StoreManagerInterface $storeManager,
        \Magento\Catalog\Api\CategoryAttributeRepositoryInterface $metadataService,
        \Magento\Catalog\Model\ResourceModel\Category\Tree $categoryTreeResource,
        \Magento\Catalog\Model\ResourceModel\Category\TreeFactory $categoryTreeFactory,
        \Magento\Store\Model\ResourceModel\Store\CollectionFactory $storeCollectionFactory,
        \Magento\Framework\UrlInterface $url,
        \Magento\Catalog\Model\ResourceModel\Product\CollectionFactory $productCollectionFactory,
        \Magento\Catalog\Model\Config $catalogConfig,
        \Magento\Framework\Filter\FilterManager $filter,
        FlatState $flatState,
        \Magento\CatalogUrlRewrite\Model\CategoryUrlPathGenerator $categoryUrlPathGenerator,
        UrlFinderInterface $urlFinder,
        \Magento\Framework\Indexer\IndexerRegistry $indexerRegistry,
        \Magento\Catalog\Api\CategoryRepositoryInterface $categoryRepository,
        \Magento\Framework\Model\ResourceModel\AbstractResource $resource = null,
        \Magento\Framework\Data\Collection\AbstractDb $resourceCollection = null,
        array $data = []
    ) {
        $this->metadataService = $metadataService;
        $this->_treeModel = $categoryTreeResource;
        $this->_categoryTreeFactory = $categoryTreeFactory;
        $this->_storeCollectionFactory = $storeCollectionFactory;
        $this->_url = $url;
        $this->_productCollectionFactory = $productCollectionFactory;
        $this->_catalogConfig = $catalogConfig;
        $this->filter = $filter;
        $this->flatState = $flatState;
        $this->categoryUrlPathGenerator = $categoryUrlPathGenerator;
        $this->urlFinder = $urlFinder;
        $this->indexerRegistry = $indexerRegistry;
        $this->categoryRepository = $categoryRepository;
        parent::__construct(
            $context,
            $registry,
            $extensionFactory,
            $customAttributeFactory,
            $storeManager,
            $resource,
            $resourceCollection,
            $data
        );
    }

    public function getProductCollection()
    {
        $collection = $this->_productCollectionFactory->create()->setStoreId(
            $this->getStoreId()
        )->addCategoryFilter(
            $this
        );
        return $collection;
    }
}
?>