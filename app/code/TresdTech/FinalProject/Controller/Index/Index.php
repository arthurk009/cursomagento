<?php
namespace TresdTech\FinalProject\Controller\Index;

class Index extends \Magento\Framework\App\Action\Action
{
	protected $_pageFactory;

	protected $_bookFactory;

	public function __construct(
		\Magento\Framework\App\Action\Context $context,
		\Magento\Framework\View\Result\PageFactory $pageFactory,
		\TresdTech\FinalProject\Model\BookFactory $bookFactory
		)
	{
		$this->_pageFactory = $pageFactory;
		$this->_bookFactory = $bookFactory;
		return parent::__construct($context);
	}

	public function execute()
	{
		$book = $this->_bookFactory->create();
		$collection = $book->getCollection();
		foreach($collection as $item){
			echo "<pre>sssssss";
			print_r($item->getData());
			echo "</pre>";
		}
		exit();
		return $this->_pageFactory->create();
	}
}