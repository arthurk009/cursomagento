<?php
namespace Mentorias\Vacuna\Block;

class Step1 extends \Magento\Framework\View\Element\Template
{
    /**
     * @param \Magento\Framework\View\Element\Template\Context $context
     * @param array $data
     */
    protected $_customerSession;

    public function __construct(\Magento\Framework\View\Element\Template\Context $context,
    \Magento\Customer\Model\Session $session
    )
	{
        $this->_customerSession = $session;
		parent::__construct($context);
	}

	public function sayHello()
	{
		return __('Hello World');
	}

	public function getFormAction()
    {
        return $this->getUrl('vacuna/index/step2', ['_secure' => true]);
    }

    public function getFormFinishAction(){
        return $this->getUrl('vacuna/index/cart', ['_secure' => true]);
    }

    public function getFormStep3Action()
    {
        return $this->getUrl('vacuna/index/step3', ['_secure' => true]);
    }

    public function getFolioSession()
    {
        return $this->_customerSession->getVacunaFolio(); 
    }

}
