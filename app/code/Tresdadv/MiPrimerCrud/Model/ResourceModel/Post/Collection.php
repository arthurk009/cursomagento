<?php
namespace Tresdadv\MiPrimerCrud\Model\ResourceModel\Post;

class Collection extends \Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection
{
	protected $_idFieldName = 'post_id';
	protected $_eventPrefix = 'tresdadv_miprimercrud_post_collection';
	protected $_eventObject = 'post_collection';

	/**
	 * Define resource model
	 *
	 * @return void
	 */
	protected function _construct()
	{
		$this->_init('Tresdadv\MiPrimerCrud\Model\Post', 'Tresdadv\MiPrimerCrud\Model\ResourceModel\Post');
	}

}