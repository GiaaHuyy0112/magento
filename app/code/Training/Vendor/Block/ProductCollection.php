<?php

namespace Training\Vendor\Block;

class ProductCollection extends \Magento\Framework\View\Element\Template
{
    protected $_productCollectionFactory;

    public function __construct(
        \Magento\Backend\Block\Template\Context $context,
        \Magento\Catalog\Model\ResourceModel\Product\CollectionFactory $productCollectionFactory,
        array $data = []
    ) {
        $this->_productCollectionFactory = $productCollectionFactory;
        parent::__construct($context, $data);
    }

    public function getProductCollections()
    {
        $collection = $this->_productCollectionFactory->create();
        $collection->addAttributeToSelect('name');
        $collection->addAttributeToFilter('select', '1');
        $collection->setOrder('created_at', 'asc');
        $collection->setPageSize(3); // fetching only 3 products
        return $collection;
    }

    public function getQuery()
    {
        return $this->getProductCollections()->getSelect()->__toString();
    }
}
