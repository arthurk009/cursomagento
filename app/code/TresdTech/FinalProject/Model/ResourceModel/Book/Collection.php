<?php
namespace TresdTech\FinalProject\Model\ResourceModel\Book;

class Collection extends \Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection
{
	protected $_idFieldName = 'book_id';
	protected $_eventPrefix = 'tresdtech_finalproject_book_collection';
	protected $_eventObject = 'book_collection';

	/**
	 * Define resource model
	 *
	 * @return void
	 */
	protected function _construct()
	{
		$this->_init('TresdTech\FinalProject\Model\Book', 'TresdTech\FinalProject\Model\ResourceModel\Book');
	}

}