<?php
namespace TresdTech\FinalProject\Controller\Index;
use Magento\Framework\Controller\ResultFactory;
use Form\Quote\Model\QuoteFormFactory;



class Booking extends \Magento\Framework\App\Action\Action
{
	protected $_pageFactory;
    protected $_postFactory;


	public function __construct(
		\Magento\Framework\App\Action\Context $context,
		\Magento\Framework\View\Result\PageFactory $pageFactory,
        \TresdTech\FinalProject\Model\BookFactory $postFactory)
	{
		$this->_pageFactory = $pageFactory;
        $this->_postFactory = $postFactory;
		return parent::__construct($context);
	}

	// public function execute()
	// {
	// 	return $this->_pageFactory->create();
	// }

    public function execute()
    {
        //1. POST request : Get booking data
        $post = (array) $this->getRequest()->getPost();

        if (!empty($post)) {

           
            // Retrieve your form data
            // $firstname   = $post['firstname'];
            // $lastname    = $post['lastname'];
            // $phone       = $post['phone'];
            // $email       = $post['email'];

            $Data['fisrt_name']=$post['firstname'];
            $Data['last_name']=$post['lastname'];
            $Data['telephone']=$post['phone'];
            $Data['email']=$post['email'];
            

            // Doing-something with...

            $quoteData = $this->_postFactory->create();
            $quoteData->setData($Data);
            $quoteData->save();



            // Display the succes form validation message
            $this->messageManager->addSuccessMessage('Booking done !');

            // Redirect to your form page (or anywhere you want...)
            $resultRedirect = $this->resultFactory->create(ResultFactory::TYPE_REDIRECT);
            $resultRedirect->setUrl('/finalproject/index/booking');

            return $resultRedirect;
        }
        //2. GET request : Render the booking page 
        $this->_view->loadLayout();
        $this->_view->renderLayout();
    }
}