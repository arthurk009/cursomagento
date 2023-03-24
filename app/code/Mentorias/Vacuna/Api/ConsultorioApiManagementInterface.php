<?php
/**
 * Copyright ©  All rights reserved.
 * See COPYING.txt for license details.
 */
declare(strict_types=1);

namespace Mentorias\Vacuna\Api;

interface ConsultorioApiManagementInterface
{

    /**
     * POST for consultorioApi api
     * @param string $estadoId
     * @return \Magento\Framework\Controller\Result\JsonFactory
     */
    public function postConsultorioApi($estadoId);

}
