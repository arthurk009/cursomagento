<?php
namespace TresdTech\FinalProject\Model\ResourceModel;


class Book extends \Magento\Framework\Model\ResourceModel\Db\AbstractDb
{
	
	public function __construct(
		\Magento\Framework\Model\ResourceModel\Db\Context $context
	)
	{
		parent::__construct($context);
	}
	
	protected function _construct()
	{
		$this->_init('tresdtech_finalproject_book', 'book_id');
	}
	
}