<?php
/**
 * Copyright ©  All rights reserved.
 * See COPYING.txt for license details.
 */
declare(strict_types=1);

namespace Mentorias\Vacuna\Model\ResourceModel;

use Magento\Framework\Model\ResourceModel\Db\AbstractDb;

class Consultorio extends AbstractDb
{

    /**
     * @inheritDoc
     */
    protected function _construct()
    {
        $this->_init('mentorias_vacuna_consultorio', 'consultorio_id');
    }
}