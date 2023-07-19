<?php

namespace Training\Vendor\Setup;

// use Magento\Catalog\Model\Product;
// use Magento\Catalog\Setup\CategorySetupFactory;
// use Magento\Eav\Model\Entity\Attribute\ScopedAttributeInterface;
// use Magento\Eav\Setup\EavSetupFactory;
// use Magento\Framework\Setup\ModuleContextInterface;
// use Magento\Framework\Setup\ModuleDataSetupInterface;
// use Magento\Framework\Setup\UpgradeDataInterface;


use Magento\Catalog\Model\Product;
use Magento\Catalog\Setup\CategorySetupFactory;
use Magento\Eav\Model\Entity\Attribute\ScopedAttributeInterface;
use Magento\Eav\Setup\EavSetupFactory;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\ModuleDataSetupInterface;
use Magento\Framework\Setup\UpgradeDataInterface;
use Magento\Eav\Model\Entity\Attribute\SetFactory as AttributeSetFactory;

/**
 * {@inheritdoc}
 * @codeCoverageIgnore
 */
class UpgradeData implements UpgradeDataInterface
{

    protected $eavSetupFactory;
    protected $attributeSetFactory;
    protected $categorySetupFactory;

    public function __construct(
        EavSetupFactory $eavSetupFactory,
        AttributeSetFactory $attributeSetFactory,
        CategorySetupFactory $categorySetupFactory
    ) {
        $this->eavSetupFactory = $eavSetupFactory;
        $this->attributeSetFactory = $attributeSetFactory;
        $this->categorySetupFactory = $categorySetupFactory;
    }


    /**
     * {@inheritdoc}
     * @SuppressWarnings(PHPMD.ExcessiveMethodLength)
     * @SuppressWarnings(PHPMD.CyclomaticComplexity)
     * @SuppressWarnings(PHPMD.NPathComplexity)
     */
    public function upgrade(ModuleDataSetupInterface $setup, ModuleContextInterface $context)
    {
        $installer = $setup;

        $setup->startSetup();
        $eavSetup = $this->eavSetupFactory->create(['setup' => $setup]);
        $categorySetup = $this->categorySetupFactory->create(['setup' => $setup]);

        if (version_compare($context->getVersion(), '2.0.1', '<')) {
            // Attribute code and label
            $attributeCode = 'my_multiselect_attribute';
            $attributeLabel = 'My Multiselect Attribute';

            // Create attribute
            // My MultiSelect Attribute
            $eavSetup->addAttribute(
                Product::ENTITY,
                $attributeCode,
                [
                    'type' => 'text',
                    'label' => $attributeLabel,
                    'input' => 'multiselect',
                    'backend' => 'Magento\Eav\Model\Entity\Attribute\Backend\ArrayBackend',
                    'source' => 'Magento\Eav\Model\Entity\Attribute\Source\Table',
                    'required' => false,
                    'visible' => true,
                    'user_defined' => true,
                    'global' => ScopedAttributeInterface::SCOPE_GLOBAL,
                    'group' => 'General',
                    'option' => [
                        'values' => [
                            'Option 1',
                            'Option 2',
                            'Option 3',
                            'Option 4',
                        ],
                    ],
                ]
            );

            // Priority
            $eavSetup->addAttribute(
                Product::ENTITY,
                "priority",
                [
                    'type'         => 'int',
                    'label'        => 'Priority',
                    'input'        => 'select',
                    'source'       => 'Training\Vendor\Source\PriorityOptions',
                    'required'     => false,
                    'visible'      => true,
                    'position'     => 100,
                    'system'       => 0,
                    'backend'      => '',
                    'frontend'     => '',
                    'default'      => '',
                    'user_defined' => true,
                    'unique'       => false,
                    'note'         => 'Customer Priority',
                ]
            );

            // Select
            $eavSetup->addAttribute(
                Product::ENTITY,
                "select",
                [
                    'type'         => 'int',
                    'label'        => 'Select',
                    'input'        => 'boolean',
                    'source'       => \Magento\Eav\Model\Entity\Attribute\Source\Boolean::class,
                    'global'       => \Magento\Eav\Model\Entity\Attribute\ScopedAttributeInterface::SCOPE_GLOBAL,
                    'required'     => false,
                    'visible'      => true,
                    'position'     => 100,
                    'system'       => 0,
                    'backend'      => '',
                    'frontend'     => '',
                    'default'      => '',
                    'user_defined' => true,
                    'unique'       => false,
                    'filterable'   => true,
                    'note'         => 'Customer Priority',
                ]
            );

            // Add the attribute to attribute set and attribute group
            $attributeId = $eavSetup->getAttributeId(Product::ENTITY, $attributeCode);
            $attributeSetId = $categorySetup->getDefaultAttributeSetId(Product::ENTITY);
            $attributeGroupId = $categorySetup->getDefaultAttributeGroupId(Product::ENTITY, $attributeSetId);

            $eavSetup->addAttributeToSet(Product::ENTITY, $attributeSetId, $attributeGroupId, $attributeId);

            $ATTRIBUTE_GROUP = 'General'; // Attribute Group Name
            $entityTypeId = $eavSetup->getEntityTypeId(\Magento\Catalog\Model\Product::ENTITY);
            $allAttributeSetIds = $eavSetup->getAllAttributeSetIds($entityTypeId);
            foreach ($allAttributeSetIds as $attributeSetId) {
                $groupId = $eavSetup->getAttributeGroupId($entityTypeId, $attributeSetId, $ATTRIBUTE_GROUP);
                $eavSetup->addAttributeToGroup(
                    $entityTypeId,
                    $attributeSetId,
                    $groupId,
                    'select'
                );
            }
        }

        $setup->endSetup();
    }
}
