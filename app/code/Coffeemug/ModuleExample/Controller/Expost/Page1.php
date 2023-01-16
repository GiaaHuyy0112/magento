<?php

namespace Coffeemug\ModuleExample\Controller\Expost;

use Magento\Framework\App\CsrfAwareActionInterface;
use Magento\Framework\App\RequestInterface;
use Magento\Framework\App\Request\InvalidRequestException;
use Magento\Framework\View\Result\PageFactory;
use Magento\Framework\App\ActionInterface;
use Magento\Framework\Controller\Result\JsonFactory;
use Magento\Catalog\Helper\Image;

class Page1 extends \Magento\Framework\App\Action\Action implements CsrfAwareActionInterface
{
    // protected $_pageFactory;
    protected $_productCollectionFactory;
    protected $resultPageFactory;
    private $resultJsonFactory;
    protected $imageHelper;
    protected $productVisibility;
    protected $productStatus;


    public function __construct(
        \Magento\Framework\App\Action\Context $context,
        // \Magento\Framework\View\Result\PageFactory $pageFactory,
        // PageFactory $resultPageFactory,
        JsonFactory $resultJsonFactory,
        \Magento\Catalog\Model\ResourceModel\Product\CollectionFactory $productCollectionFactory,
        Image $imageHelper,
        \Magento\Catalog\Model\Product\Attribute\Source\Status $productStatus,
        \Magento\Catalog\Model\Product\Visibility $productVisibility,

    ) {
        // $this->_pageFactory = $pageFactory;
        // $this->resultPageFactory = $resultPageFactory;
        $this->resultJsonFactory = $resultJsonFactory;
        $this->_productCollectionFactory = $productCollectionFactory;
        $this->imageHelper = $imageHelper;
        $this->productStatus = $productStatus;
        $this->productVisibility = $productVisibility;
        return parent::__construct($context);
    }

    public function execute()
    {

        $collection = $this->_productCollectionFactory->create();
        $collection->addAttributeToFilter('status', ['in' => $this->productStatus->getVisibleStatusIds()]);
        $collection->setVisibility($this->productVisibility->getVisibleInSiteIds());
        $collection->addAttributeToSelect('*');
        $collection->getSelect()->orderRand()->limit(10);
        $productsList = [];
        foreach ($collection as $product) {
            $url = $this->imageHelper->init($product, 'product_thumbnail_image')->getUrl();
            $productObject = [
                'title' => $product->getName(),
                'url' => $product->getProductUrl(),
                'image' => $url,
                'price' => $product->getPrice(),
                'saleprice' => $product->getFinalPrice()
            ];
            array_push($productsList, $productObject);
        }

        $resultJson = $this->resultJsonFactory->create();
        $resultJson->setData($productsList);

        $resultJson->setHttpResponseCode(200);

        return $resultJson;
    }

    public function createCsrfValidationException(RequestInterface $request): ?InvalidRequestException
    {
        return null;
    }

    public function validateForCsrf(RequestInterface $request): ?bool
    {
        return true;
    }
}
