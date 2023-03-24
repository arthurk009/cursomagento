<?php
/**
 * Copyright ©  All rights reserved.
 * See COPYING.txt for license details.
 */
declare(strict_types=1);

namespace Mentorias\Vacuna\Api;

use Magento\Framework\Api\SearchCriteriaInterface;

interface VacunaRepositoryInterface
{

    /**
     * Save Vacuna
     * @param \Mentorias\Vacuna\Api\Data\VacunaInterface $vacuna
     * @return \Mentorias\Vacuna\Api\Data\VacunaInterface
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function save(
        \Mentorias\Vacuna\Api\Data\VacunaInterface $vacuna
    );

    /**
     * Retrieve Vacuna
     * @param string $vacunaId
     * @return \Mentorias\Vacuna\Api\Data\VacunaInterface
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function get($vacunaId);

    /**
     * Retrieve Vacuna matching the specified criteria.
     * @param \Magento\Framework\Api\SearchCriteriaInterface $searchCriteria
     * @return \Mentorias\Vacuna\Api\Data\VacunaSearchResultsInterface
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function getList(
        \Magento\Framework\Api\SearchCriteriaInterface $searchCriteria
    );

    /**
     * Delete Vacuna
     * @param \Mentorias\Vacuna\Api\Data\VacunaInterface $vacuna
     * @return bool true on success
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function delete(
        \Mentorias\Vacuna\Api\Data\VacunaInterface $vacuna
    );

    /**
     * Delete Vacuna by ID
     * @param string $vacunaId
     * @return bool true on success
     * @throws \Magento\Framework\Exception\NoSuchEntityException
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function deleteById($vacunaId);
}
