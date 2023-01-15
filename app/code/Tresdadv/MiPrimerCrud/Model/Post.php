<?php
namespace Tresdadv\MiPrimerCrud\Model;
class Post extends \Magento\Framework\Model\AbstractModel implements \Magento\Framework\DataObject\IdentityInterface
{
	const CACHE_TAG = 'tresdadv_miprimercrud_post';

	protected $_cacheTag = 'tresdadv_miprimercrud_post';

	protected $_eventPrefix = 'tresdadv_miprimercrud_post';

	protected function _construct()
	{
		$this->_init('Tresdadv\MiPrimerCrud\Model\ResourceModel\Post');
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