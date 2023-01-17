<?php

namespace Coffeemug\ModuleExample\Setup;

use Magento\Eav\Setup\EavSetup;
use Magento\Eav\Setup\EavSetupFactory;
use Magento\Framework\Setup\InstallDataInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\ModuleDataSetupInterface;

class InstallData implements InstallDataInterface
{
    private $eavSetupFactory;

    public function __construct(EavSetupFactory $eavSetupFactory)
    {
        $this->eavSetupFactory = $eavSetupFactory;
    }

    public function install(ModuleDataSetupInterface $setup, ModuleContextInterface $context)
    {
        $eavSetup = $this->eavSetupFactory->create(['setup' => $setup]);
        $eavSetup->addAttribute(
            \Magento\Catalog\Model\Product::ENTITY,
            'ghn',
            [
                'type' => 'int',
                'backend' => '',
                'frontend' => '',
                'label' => 'Giao Hang Nhanh',
                'input' => 'boolean',
                'class' => '',
                'source' => '',
                'global' => \Magento\Eav\Model\Entity\Attribute\ScopedAttributeInterface::SCOPE_GLOBAL,
                'visible' => true,
                'required' => true,
                'user_defined' => false,
                'default' => '',
                'searchable' => false,
                'filterable' => false,
                'comparable' => false,
                'visible_on_front' => false,
                'used_in_product_listing' => true,
                'unique' => false,
                'apply_to' => ''
            ]
        );

        // $eavSetup->removeAttribute(
        //     \Magento\Catalog\Model\Product::ENTITY,
        //     'freeship'
        // );

        $eavSetup->addAttribute(
            \Magento\Catalog\Model\Product::ENTITY,
            'freeship',
            [
                'type' => 'int',
                'backend' => '',
                'frontend' => '',
                'label' => 'Freeship',
                'input' => 'boolean',
                'class' => '',
                'source' => 'Magento\Eav\Model\Entity\Attribute\Source\Boolean',
                'global' => \Magento\Eav\Model\Entity\Attribute\ScopedAttributeInterface::SCOPE_GLOBAL,
                'visible' => true,
                'required' => false,
                'user_defined' => false,
                'default' => '',
                'searchable' => true,
                'filterable' => true,
                'comparable' => false,
                'visible_on_front' => true,
                'used_in_product_listing' => true,
                'unique' => false,
                'apply_to' => ''
            ]
        );

        $eavSetup->removeAttribute(
            \Magento\Catalog\Model\Product::ENTITY,
            'makein'
        );

        $eavSetup->addAttribute(
            \Magento\Catalog\Model\Product::ENTITY,
            'makein',
            [
                'type' => 'text',
                'backend' => '',
                'frontend' => '',
                'label' => 'Make in',
                'input' => 'select',
                'class' => '',
                'source' => 'Magento\Eav\Model\Entity\Attribute\Source\Table',
                'global' => \Magento\Eav\Model\Entity\Attribute\ScopedAttributeInterface::SCOPE_GLOBAL,
                'visible' => true,
                'required' => false,
                'user_defined' => false,
                'default' => '',
                'searchable' => false,
                'filterable' => false,
                'comparable' => false,
                'visible_on_front' => false,
                'used_in_product_listing' => false,
                'unique' => false,
                'apply_to' => 'configurable',
                'option' =>
                array(
                    'values' =>
                    array(
                        0 => 'Trung Quoc',
                        1 => 'Duc',
                        2 => 'Bangladesh',
                        3 => 'Viet Nam',
                        4 => 'An Do'
                    ),
                ),
            ]
        );
    }
}
