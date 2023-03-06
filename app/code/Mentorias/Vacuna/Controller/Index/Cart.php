<?php
namespace Mentorias\Vacuna\Controller\Index;

class Cart extends \Magento\Framework\App\Action\Action
{

    /**
     * @var \Magento\Framework\View\Result\PageFactory
     */
    protected $_pageFactory;
	protected $_customerSession;
	protected $resultFactory;
    protected $formKey; 
    protected $cart;
    protected $_helper;

    /**
     * @param \Magento\Framework\App\Action\Context $context
     */
    public function __construct(
		\Magento\Framework\App\Action\Context $context,
		\Magento\Framework\View\Result\PageFactory $pageFactory,
		\Magento\Customer\Model\Session $session,
		\Magento\Framework\Controller\ResultFactory $resultFactory,
		\Magento\Framework\Data\Form\FormKey $formKey,
        \Magento\Checkout\Model\Cart $cart,
        \Mentorias\Vacuna\Helper\Data $helper
		)
	{
		$this->_pageFactory = $pageFactory;
		$this->_customerSession = $session;
		$this->resultFactory = $resultFactory;
        $this->formKey = $formKey;
        $this->cart = $cart;
        $this->_helper = $helper;

		return parent::__construct($context);
	}
    /**
     * View page action
     *
     * @return \Magento\Framework\Controller\ResultInterface
     */
    public function execute()
    {
        if(!$this->_customerSession->isLoggedIn()){
			$redirect = $this->resultFactory->create(\Magento\Framework\Controller\ResultFactory::TYPE_REDIRECT);
			$redirect->setUrl('customer/account/login');
			return $redirect;
		}

        // agrega al carrito 
        $params = array(
            'form_key' => $this->formKey->getFormKey(),
            'qty' =>1
            ); 
        $product = $this->_helper->getVacunaProduct();
        
        if ($product){
            $this->cart->addProduct($product, $params);
            $this->cart->save();
            $redirect = $this->resultFactory->create(\Magento\Framework\Controller\ResultFactory::TYPE_REDIRECT);
            $redirect->setUrl('/checkout/cart/index');
            return $redirect;
        }


        return $this->_pageFactory->create();
    }
}
