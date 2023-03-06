<?php
namespace Mentorias\Vacuna\Model\ResourceModel;

class Vacuna extends \Magento\Framework\Model\ResourceModel\Db\AbstractDb
{
    public function __construct(
        \Magento\Framework\Model\ResourceModel\Db\Context $context
    )
    {
        parent::__construct($context);
    }

    protected function _construct()
    {
        $this->_init('mentorias_vacuna_covid_influenza', 'appointment_vaccine_id');
    }
}
