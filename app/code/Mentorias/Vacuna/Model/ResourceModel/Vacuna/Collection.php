<?php
namespace Mentorias\Vacuna\Model\ResourceModel\Vacuna;

class Collection extends \Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection
{
    protected $_idFieldName = 'appointment_vaccine_id';
    protected $_eventPrefix = 'mentorias_vacuna_vacuna_collection';
    protected $_eventObject = 'vacuna_collection';

    /**
     * Define the resource model & the model.
     *
     * @return void
     */
    protected function _construct()
    {
        $this->_init('Mentorias\Vacuna\Model\Vacuna', 'Mentorias\Vacuna\Model\ResourceModel\Vacuna');
    }
}
