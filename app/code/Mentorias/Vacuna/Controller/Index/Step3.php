<?php
namespace Mentorias\Vacuna\Controller\Index;

class Step3 extends \Magento\Framework\App\Action\Action
{
	protected $_pageFactory;
	protected $_customerSession;
	protected $resultFactory;
	protected $customerSession;
	protected $_postFactory;

	public function __construct(
		\Magento\Framework\App\Action\Context $context,
		\Magento\Framework\View\Result\PageFactory $pageFactory,
		\Magento\Customer\Model\Session $session,
		\Magento\Framework\Controller\ResultFactory $resultFactory,
		\Mentorias\Vacuna\Model\VacunaFactory $postFactory
		//\Magento\Customer\Model\Session $customerSession
		)
	{
		$this->_pageFactory = $pageFactory;
		$this->_customerSession = $session;
		$this->resultFactory = $resultFactory;
		$this->_postFactory = $postFactory;
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

		
        if (!empty($post) && $post['curp'] !='' && $post['name'] !=''&& $post['lastname'] !='' 
			&& $post['second_lastname'] !='' && $post['birthdate'] !='' && $post['phone'] !='' && $post['gender'] !=''
		 ) {
          		
			$this->_customerSession->setData('step2', $this->getRequest()->getPost());
			// $algo = $this->_customerSession->getData('step2')->toArray();
			// print_r($algo);
			// echo $algo->curp;
			
			$folio = "VAC-".date('YmdHis').rand(10,100);
			$this->_customerSession->setVacunaFolio($folio); 

			
			$dataDB = array_merge($this->_customerSession->getData('step1')->toArray(), $this->_customerSession->getData('step2')->toArray());
			$dateTime = $dataDB['day']." ".$dataDB['hour'];
			$dataDB['date_time']=$dateTime;
			$dataDB['folio']=$folio;
			unset($dataDB['form_key'],$dataDB['day'],$dataDB['hour']);

            $quoteData = $this->_postFactory->create();
            $quoteData->setData($dataDB);
            $quoteData->save();

            }else{
				$redirect = $this->resultFactory->create(\Magento\Framework\Controller\ResultFactory::TYPE_REDIRECT);
				$redirect->setUrl('/vacuna/index/step2');
				return $redirect;
			}
		return $this->_pageFactory->create();
	}
}