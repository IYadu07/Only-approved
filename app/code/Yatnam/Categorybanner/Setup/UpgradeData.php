<?php

namespace Yatnam\Categorybanner\Setup;

use Magento\Framework\Setup\UpgradeDataInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\ModuleDataSetupInterface;
use Magento\Catalog\Setup\CategorySetupFactory;

class UpgradeData implements UpgradeDataInterface
{
    /**
     * Category setup factory
     *
     * @var CategorySetupFactory
     */
    private $categorySetupFactory;

    /**
     * Init
     *
     * @param CategorySetupFactory $categorySetupFactory
     */
    public function __construct(
        CategorySetupFactory $categorySetupFactory
    ) {
        $this->categorySetupFactory = $categorySetupFactory;
    }

    public function upgrade(
        ModuleDataSetupInterface $setup,
        ModuleContextInterface $context
    ) {
        $setup->startSetup();
        if (version_compare($context->getVersion(), '1.0.2', '<')) {
            $categorySetup = $this->categorySetupFactory->create(['setup' => $setup]);

            $categorySetup->addAttribute(
                \Magento\Catalog\Model\Category::ENTITY,
                'category_banner_image',
                [
                    'type' => 'varchar',
                    'label' => 'Category Banner Image',
                    'input' => 'image',
                    'backend' => 'Magento\Catalog\Model\Category\Attribute\Backend\Image',
                    'required' => false,
                    'sort_order' => 5,
                    'global' => \Magento\Eav\Model\Entity\Attribute\ScopedAttributeInterface::SCOPE_STORE,
                    'group' => 'General Information',
                ]
            )->addAttribute(
                \Magento\Catalog\Model\Category::ENTITY,
                'category_banner_title_color_mobile',
                [
                    'type' => 'int',
                    'label' => 'Mobile Category Title Color',
                    'input' => 'select',
                    'required' => false,
                    'sort_order' => 5,
                    'global' => \Magento\Eav\Model\Entity\Attribute\ScopedAttributeInterface::SCOPE_STORE,
                    'group' => 'General Information',
                ]
            )->addAttribute(
                \Magento\Catalog\Model\Category::ENTITY,
                'category_mobile_description',
                [
                    'type' => 'text',
                    'label' => 'Mobile Description',
                    'input' => 'textarea',
                    'required' => false,
                    'sort_order' => 5,
                    'global' => \Magento\Eav\Model\Entity\Attribute\ScopedAttributeInterface::SCOPE_STORE,
                    'group' => 'General Information',
                    'wysiwyg_enabled' => true,
                    'is_html_allowed_on_front' => true,
                ]
            );
        }
        $setup->endSetup();
    }
}
