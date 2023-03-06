<?php
namespace Mentorias\Vacuna\Controller\Index;

class Step2 extends \Magento\Framework\App\Action\Action
{
	protected $_pageFactory;
	protected $_customerSession;
	protected $resultFactory;

	public function __construct(
		\Magento\Framework\App\Action\Context $context,
		\Magento\Framework\View\Result\PageFactory $pageFactory,
		\Magento\Customer\Model\Session $session,
		\Magento\Framework\Controller\ResultFactory $resultFactory
		)
	{
		$this->_pageFactory = $pageFactory;
		$this->_customerSession = $session;
		$this->resultFactory = $resultFactory;
		return parent::__construct($context);
	}

	public function execute()
	{
		if(!$this->_customerSession->isLoggedIn()){
			$redirect = $this->resultFactory->create(\Magento\Framework\Controller\ResultFactory::TYPE_REDIRECT);
			$redirect->setUrl('customer/account/login');
			return $redirect;
		}


		$post = (array) $this->getRequest()->getPost();

        if (!empty($post) && $post['address'] !='' && $post['email'] !='' && $post['consultorio_id'] !='' && $post['day'] !='' && $post['hour'] !='') {
				$this->_customerSession->setData('step1', $this->getRequest()->getPost());
			
            }else{
				$redirect = $this->resultFactory->create(\Magento\Framework\Controller\ResultFactory::TYPE_REDIRECT);
				$redirect->setUrl('/vacuna/index/step1');
				return $redirect;
			}
		return $this->_pageFactory->create();
	}
}