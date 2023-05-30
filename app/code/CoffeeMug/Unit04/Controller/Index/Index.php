<?php

namespace CoffeeMug\Unit04\Controller\Index;

use Magento\Framework\App\Action\Context;
use Magento\Framework\View\Result\PageFactory;
use Magento\Cms\Model\BlockRepository;
use Magento\Framework\Logger\Monolog;
use Magento\Store\Model\ResourceModel\Store\Collection;
use \Magento\Store\Model\StoreManagerInterface;
use Psr\Log\LoggerInterface;
use Magento\Store\Model\ResourceModel\Store\CollectionFactory;
use Magento\Catalog\Model\CategoryFactory;

class Index extends \Magento\Framework\App\Action\Action
{
    protected $_pageFactory;
    protected $_blockRepository;
    protected $_collectionFactory;
    protected $_storeManager;
    protected $_categoryRepository;
    protected $_logger;

    protected $storeCollectionFactory;
    protected $categoryFactory;

    public function __construct(
        \Magento\Framework\App\Action\Context $context,
        \Magento\Framework\View\Result\PageFactory $pageFactory,
        \Magento\Cms\Model\BlockRepository $blockRepository,
        \Magento\Store\Model\StoreManagerInterface $storeManager,
        \Magento\Catalog\Api\CategoryRepositoryInterface $categoryRepository,
        LoggerInterface $logger,
        Collection $collection,

        CollectionFactory $storeCollectionFactory,
        CategoryFactory $categoryFactory

    ) {
        $this->_pageFactory = $pageFactory;
        $this->_blockRepository = $blockRepository;
        $this->_collectionFactory = $collection;
        $this->_storeManager = $storeManager;
        $this->_categoryRepository = $categoryRepository;
        $this->_logger = $logger;

        $this->storeCollectionFactory = $storeCollectionFactory;
        $this->categoryFactory = $categoryFactory;

        return parent::__construct($context);
    }

    public function execute()
    {
        // $storeManagerDataList = $this->_storeManager->getStores();
        // $options = array();

        // foreach ($storeManagerDataList as $key => $value) {
        //     $options[] = ['label' => $value['name'] . ' - ' . $value['code'], 'id' => $key];
        //     $storeId = $this->_storeManager->getWebsite($key)->getDefaultStore()->getId();
        //     $rootNodeId = $this->_storeManager->getStore($storeId)->getRootCategoryId();
        //     $categoryInstance = $this->_categoryRepository->get($rootNodeId, $storeId);
        //     $name = $categoryInstance->getName();
        // }




        $storeCollection = $this->storeCollectionFactory->create();
        $storeCollection->load();

        foreach ($storeCollection as $store) {
            $rootCategoryId = $store->getRootCategoryId();
            $categoryCollection = $this->categoryFactory->create()->getCollection();
            $categoryCollection->addFieldToFilter('entity_id', $rootCategoryId);
            $categoryCollection->addAttributeToSelect('name');

            $rootCategory = $categoryCollection->getFirstItem();
            $rootCategoryName = $rootCategory->getName();

            echo "Store View: " . $store->getName() . " | Root Category: " . $rootCategoryName . "<br>";
        }
    }
}
