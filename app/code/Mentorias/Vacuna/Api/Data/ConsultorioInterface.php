<?php
/**
 * Copyright ©  All rights reserved.
 * See COPYING.txt for license details.
 */
declare(strict_types=1);

namespace Mentorias\Vacuna\Api\Data;

interface ConsultorioInterface
{

    const CONSULTORIO_NAME = 'consultorio_name';
    const STATE_ID = 'state_id';
    const CONSULTORIO_ID = 'consultorio_id';

    /**
     * Get consultorio_id
     * @return string|null
     */
    public function getConsultorioId();

    /**
     * Set consultorio_id
     * @param string $consultorioId
     * @return \Mentorias\Vacuna\Consultorio\Api\Data\ConsultorioInterface
     */
    public function setConsultorioId($consultorioId);

    /**
     * Get consultorio_name
     * @return string|null
     */
    public function getConsultorioName();

    /**
     * Set consultorio_name
     * @param string $consultorioName
     * @return \Mentorias\Vacuna\Consultorio\Api\Data\ConsultorioInterface
     */
    public function setConsultorioName($consultorioName);

    /**
     * Get state_id
     * @return string|null
     */
    public function getStateId();

    /**
     * Set state_id
     * @param string $stateId
     * @return \Mentorias\Vacuna\Consultorio\Api\Data\ConsultorioInterface
     */
    public function setStateId($stateId);
}