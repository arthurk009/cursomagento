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
    protected $checkoutSession;

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
        \Mentorias\Vacuna\Helper\Data $helper,
        \Magento\Checkout\Model\Session $checkoutSession
		)
	{
		$this->_pageFactory = $pageFactory;
		$this->_customerSession = $session;
		$this->resultFactory = $resultFactory;
        $this->formKey = $formKey;
        $this->cart = $cart;
        $this->_helper = $helper;
        $this->checkoutSession = $checkoutSession;

		return parent::__construct($context);
	}
    /**
     * View page action
     *
     * @return \Magento\Framework\Controller\ResultInterface
     */
    public function execute()
    {
        $redirect = $this->resultFactory->create(\Magento\Framework\Controller\ResultFactory::TYPE_REDIRECT);

        if(!$this->_customerSession->isLoggedIn()){
			$redirect->setUrl('customer/account/login');
			return $redirect;
		}
        $post = (array) $this->getRequest()->getPost();
        if(isset($post['method']) && $post['method']==2){ // si es a sucursal lo manda a inicio
            $redirect->setUrl('/');
            return $redirect;
        }

        if(!$this->_customerSession->getData('step1') || !$this->_customerSession->getData('step2')){
            $redirect->setUrl('/vacuna/index/step1');
            return $redirect;
        }else{
                // agrega al carrito
                $product = $this->_helper->getVacunaProduct();
                $price = $product->getPriceInfo()->getPrice('final_price')->getValue();
                $params = array(
                        'form_key'  => $this->formKey->getFormKey(),
                        'qty'       => 1,
                        'price'     => $price
                    );
                if($product){
                    if(!$this->checkoutSession->getQuote()->hasProductId($product->getEntityId())){
                        $this->cart->addProduct($product, $params);
                        $this->cart->save();
                    }
                    $redirect->setUrl('/checkout/cart/index');
                    return $redirect;
                }
                return $this->_pageFactory->create();

        }


    }
}
