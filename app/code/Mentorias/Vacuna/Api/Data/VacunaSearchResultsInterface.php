<?php
/**
 * Copyright ©  All rights reserved.
 * See COPYING.txt for license details.
 */
declare(strict_types=1);

namespace Mentorias\Vacuna\Api\Data;

interface VacunaSearchResultsInterface extends \Magento\Framework\Api\SearchResultsInterface
{

    /**
     * Get Vacuna list.
     * @return \Mentorias\Vacuna\Api\Data\VacunaInterface[]
     */
    public function getItems();

    /**
     * Set appointment_vaccine_id list.
     * @param \Mentorias\Vacuna\Api\Data\VacunaInterface[] $items
     * @return $this
     */
    public function setItems(array $items);
}
