<?php

namespace Yatnam\CustomLayout\Block;

use Magento\Framework\View\Element\Template;
use Magento\Framework\View\Element\Template\Context;
use Magento\Catalog\Model\Layer\Resolver as LayerResolver;
use Magento\Catalog\Api\CategoryRepositoryInterface;
use Psr\Log\LoggerInterface;

class Brand extends Template
{
    protected $layerResolver;
    protected $categoryRepository;
    protected $logger;
    protected $storeManager;
    protected $categoryFactory;

    public function __construct(
        Context $context,
        LayerResolver $layerResolver,
        CategoryRepositoryInterface $categoryRepository,
        LoggerInterface $logger,
        \Magento\Store\Model\StoreManagerInterface $storeManager,
        \Magento\Catalog\Model\CategoryFactory $categoryFactory,
        array $data = []
    ) {
        $this->layerResolver = $layerResolver;
        $this->categoryRepository = $categoryRepository;
        $this->logger = $logger;
        $this->storeManager = $storeManager;
        $this->categoryFactory = $categoryFactory;
        parent::__construct($context, $data);
    }

    public function getSubcategoriesDetails()
    {
        // Load the parent category
        $parentCategoryId = 6; // Update with the correct parent category ID
        $parentCategory = $this->categoryRepository->get($parentCategoryId);

        $subcategoriesDetails = [];

        if ($parentCategory) {
            // Get subcategories of the parent category
            $subcategories = $parentCategory->getChildrenCategories();

            // Iterate through each subcategory
            foreach ($subcategories as $subcategory) {
                $imageUrl = ''; // Initialize image URL

                // Load category model
                $category = $this->categoryFactory->create()->load($subcategory->getId());

                // Get image name based on the attribute code
                $imageName = $category->getData('image'); // Assuming 'image' is the attribute code for the image

                if ($imageName) {
                    // Construct image URL using image name
                    // Assuming $imageName contains the image name including the "/OnlyApproved/pub/media/" segment
                    $imageName = str_replace('/media/', '', $imageName);
                    $imageUrl = $this->storeManager->getStore()->getBaseUrl(\Magento\Framework\UrlInterface::URL_TYPE_MEDIA) . $imageName;
                }

                // Get category URL
                $categoryUrl = $subcategory->getUrl();

                // Add subcategory details to the array
                $subcategoriesDetails[] = [
                    'image_url' => $imageUrl,
                    'url' => $categoryUrl,
                    'name' => $subcategory->getName() // Add category name if needed
                ];
            }
        }

        return $subcategoriesDetails;
    }
}
