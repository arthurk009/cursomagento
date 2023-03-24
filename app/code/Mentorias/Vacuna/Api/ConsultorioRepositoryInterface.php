<?php
/**
 * Copyright ©  All rights reserved.
 * See COPYING.txt for license details.
 */
declare(strict_types=1);

namespace Mentorias\Vacuna\Api;

use Magento\Framework\Api\SearchCriteriaInterface;

interface ConsultorioRepositoryInterface
{

    /**
     * Save Consultorio
     * @param \Mentorias\Vacuna\Api\Data\ConsultorioInterface $consultorio
     * @return \Mentorias\Vacuna\Api\Data\ConsultorioInterface
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function save(
        \Mentorias\Vacuna\Api\Data\ConsultorioInterface $consultorio
    );

    /**
     * Retrieve Consultorio
     * @param string $consultorioId
     * @return \Mentorias\Vacuna\Api\Data\ConsultorioInterface
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function get($consultorioId);

    /**
     * Retrieve Consultorio matching the specified criteria.
     * @param \Magento\Framework\Api\SearchCriteriaInterface $searchCriteria
     * @return \Mentorias\Vacuna\Api\Data\ConsultorioSearchResultsInterface
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function getList(
        \Magento\Framework\Api\SearchCriteriaInterface $searchCriteria
    );

    /**
     * Delete Consultorio
     * @param \Mentorias\Vacuna\Api\Data\ConsultorioInterface $consultorio
     * @return bool true on success
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function delete(
        \Mentorias\Vacuna\Api\Data\ConsultorioInterface $consultorio
    );

    /**
     * Delete Consultorio by ID
     * @param string $consultorioId
     * @return bool true on success
     * @throws \Magento\Framework\Exception\NoSuchEntityException
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function deleteById($consultorioId);

    //public function getConsultorioByStateId($id)

    
}