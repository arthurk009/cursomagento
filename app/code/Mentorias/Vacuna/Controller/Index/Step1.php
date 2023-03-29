<?php
namespace Mentorias\Vacuna\Controller\Index;

class Step1 extends \Magento\Framework\App\Action\Action
{
	protected $_pageFactory;
	protected $_customerSession;
	protected $resultFactory;
	protected $postFactory;

	public function __construct(
		\Magento\Framework\App\Action\Context $context,
		\Magento\Framework\View\Result\PageFactory $pageFactory,
		\Magento\Customer\Model\Session $session,
		\Magento\Framework\Controller\ResultFactory $resultFactory,
		\Mentorias\Vacuna\Model\VacunaFactory $postFactory

		)
	{
		
		$this->_pageFactory = $pageFactory;
		$this->_customerSession = $session;
		$this->resultFactory = $resultFactory;
		$this->postFactory = $postFactory;
		return parent::__construct($context);
		
	}

	public function execute()
	{
		if(!$this->_customerSession->isLoggedIn()){
			$redirect = $this->resultFactory->create(\Magento\Framework\Controller\ResultFactory::TYPE_REDIRECT);
			$redirect->setUrl('../../customer/account/login');
			return $redirect;
		}
		return $this->_pageFactory->create();
	}
}