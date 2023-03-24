<?php
/**
 * Copyright ©  All rights reserved.
 * See COPYING.txt for license details.
 */
declare(strict_types=1);

namespace Mentorias\Vacuna\Model;

use Magento\Framework\Model\AbstractModel;
use Mentorias\Vacuna\Api\Data\ConsultorioInterface;

class Consultorio extends AbstractModel implements ConsultorioInterface
{

    /**
     * @inheritDoc
     */
    public function _construct()
    {
        $this->_init(\Mentorias\Vacuna\Model\ResourceModel\Consultorio::class);
    }

    /**
     * @inheritDoc
     */
    public function getConsultorioId()
    {
        return $this->getData(self::CONSULTORIO_ID);
    }

    /**
     * @inheritDoc
     */
    public function setConsultorioId($consultorioId)
    {
        return $this->setData(self::CONSULTORIO_ID, $consultorioId);
    }

    /**
     * @inheritDoc
     */
    public function getConsultorioName()
    {
        return $this->getData(self::CONSULTORIO_NAME);
    }

    /**
     * @inheritDoc
     */
    public function setConsultorioName($consultorioName)
    {
        return $this->setData(self::CONSULTORIO_NAME, $consultorioName);
    }

    /**
     * @inheritDoc
     */
    public function getStateId()
    {
        return $this->getData(self::STATE_ID);
    }

    /**
     * @inheritDoc
     */
    public function setStateId($stateId)
    {
        return $this->setData(self::STATE_ID, $stateId);
    }
}