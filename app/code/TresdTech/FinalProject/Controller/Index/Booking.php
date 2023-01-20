<?php
namespace TresdTech\FinalProject\Controller\Index;
use Magento\Framework\Controller\ResultFactory;
use Form\Quote\Model\QuoteFormFactory;
//use Magento\Framework\Exception\LocalizedException;




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

	

    public function execute()
    {
        $post = (array) $this->getRequest()->getPost();

        if (!empty($post)) {
           
            // $this->validatedParams();
            $Data['fisrt_name']=$post['firstname'];
            $Data['last_name']=$post['lastname'];
            $Data['telephone']=$post['phone'];
            $Data['email']=$post['email'];
            
            $quoteData = $this->_postFactory->create();
            $quoteData->setData($Data);
            $quoteData->save();



            $this->messageManager->addSuccessMessage('Registro Guardado correctamente !');

            $resultRedirect = $this->resultFactory->create(ResultFactory::TYPE_REDIRECT);
            $resultRedirect->setUrl('/finalproject/index/booking');

            return $resultRedirect;
        }
        $this->_view->loadLayout();
        $this->_view->renderLayout();
    }

    // private function validatedParams()
    // {
    //     $request = $this->getRequest();
    //     if (trim($request->getParam('firstname')) === '') {
    //         throw new LocalizedException(__('First Name is missing'));
    //     }

    //     return $request->getParams();
    // }
}