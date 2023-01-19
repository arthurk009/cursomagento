<?php
namespace TresdTech\FinalProject\Model;
class Book extends \Magento\Framework\Model\AbstractModel implements \Magento\Framework\DataObject\IdentityInterface
{
	const CACHE_TAG = 'tresdtech_finalproject_book';

	protected $_cacheTag = 'tresdtech_finalproject_book';

	protected $_eventPrefix = 'tresdtech_finalproject_book';

	protected function _construct()
	{
		$this->_init('TresdTech\FinalProject\Model\ResourceModel\Book');
	}

	public function getIdentities()
	{
		return [self::CACHE_TAG . '_' . $this->getId()];
	}

	public function getDefaultValues()
	{
		$values = [];

		return $values;
	}
}