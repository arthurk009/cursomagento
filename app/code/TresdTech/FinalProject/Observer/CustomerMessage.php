<?php

namespace TresdTech\FinalProject\Observer;

class CustomerMessage implements \Magento\Framework\Event\ObserverInterface
{

	
    protected $messageManager;

    
    public function __construct(
        \Magento\Framework\Message\ManagerInterface $messageManager
    ) {
        $this->messageManager = $messageManager;
    }


	public function execute(\Magento\Framework\Event\Observer $observer)
	{
		
		$customer = $observer->getEvent()->getCustomer();
			
		$name = $customer->getName();
        $message = "Bienvenido ".$name;

		$this->messageManager->addSuccessMessage($message);

        //throw new \Magento\Framework\Exception\CouldNotDeleteException(__("Prices have been changed!"));
	}
}