<?php
namespace Tresdadv\MiPrimerCrud\Controller\Index;
use \Tresdadv\MiPrimerCrud\Helper\Data;


class Test extends \Magento\Framework\App\Action\Action
{
	protected $_pageFactory;

	public function __construct(
		\Magento\Framework\App\Action\Context $context,
		\Magento\Framework\View\Result\PageFactory $pageFactory,
		Data $helper)
	{
		$this->_pageFactory = $pageFactory;
		$this->helper = $helper;
		return parent::__construct($context);
	}

	// public function execute()
	// {
	// 	echo "Hello World";
	// 	echo $this->helper->getStoreConfig(2,3);
	// 	//exit;
	// }


	public function execute()
	{
		$textDisplay = new \Magento\Framework\DataObject(array('text' => '3DADV'));
		$this->_eventManager->dispatch('tresdadv_display_text', ['mp_text' => $textDisplay]);
		echo $textDisplay->getText();
		exit;
	}
}