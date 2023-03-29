<?php
namespace Mentorias\Vacuna\Block;



class VacunasListApi extends \Magento\Framework\View\Element\Template
{
    /**
     * @var \Magento\Framework\View\Result\PageFactory
     */
    protected $_pageFactory;
    protected $curlFactory;
    protected $jsonHelper;

    /**
     * @param \Magento\Framework\App\Action\Context $context
     */
    public function __construct(
		\Magento\Framework\View\Element\Template\Context $context,
       \Magento\Framework\View\Result\PageFactory $pageFactory,
       \Magento\Framework\HTTP\Adapter\CurlFactory $curlFactory,
       \Magento\Framework\Json\Helper\Data $jsonHelper
    )
    {
		
        $this->_pageFactory = $pageFactory;
        $this->curlFactory = $curlFactory;
        $this->jsonHelper = $jsonHelper;
		return parent::__construct($context);
        
    }

    public function getPostCollection(){
		$apiUrl = "http://magentotest.test/index.php/rest/V1/mentorias-vacuna/vacunaapi/";
        $dynamicUrl = $apiUrl;
        $httpAdapter = $this->curlFactory->create();
        $httpAdapter->write(
            \Zend_Http_Client::POST,
            $dynamicUrl,
            '1.1',
           ['Content-Type:application/json']
       );
      $response = $httpAdapter->read();
      $body = \Zend_Http_Response::extractBody($response);
      
      $response = $this->jsonHelper->jsonDecode($body);
	  return $response;
	}


    
}
