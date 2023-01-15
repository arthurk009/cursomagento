<?php
 
namespace Tresdadv\MiPrimerCrud\Observer;

use Magento\Framework\Event\ObserverInterface;
 
class Test implements ObserverInterface
{
 
    /**
     * @var
     */
    protected $logger;
    protected $_session;
 
    
    public function __construct(
        \Psr\Log\LoggerInterface $logger, 
        \Magento\Checkout\Model\Session $session
    ) {
        $this->_logger = $logger;
        $this->_session = $session;
    }
 
    /**
     * @param \Magento\Framework\Event\Observer $observer
     */
    public function execute(\Magento\Framework\Event\Observer $observer)
    {
       
        $quote = $this->_session->getQuote();
        $qty = $quote->getItemsSummaryQty();
        
        if($qty >=2){
            throw new \Magento\Framework\Exception\NoSuchEntityException(__('Solo se puede tomar un curso por persona'));
        }
        
    }
 
}