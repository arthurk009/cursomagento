<?php
/**
 * Copyright ©  All rights reserved.
 * See COPYING.txt for license details.
 */
declare(strict_types=1);

namespace Mentorias\Vacuna\Api\Data;

interface ConsultorioSearchResultsInterface extends \Magento\Framework\Api\SearchResultsInterface
{

    /**
     * Get Consultorio list.
     * @return \Mentorias\Vacuna\Api\Data\ConsultorioInterface[]
     */
    public function getItems();

    /**
     * Set consultorio_name list.
     * @param \Mentorias\Vacuna\Api\Data\ConsultorioInterface[] $items
     * @return $this
     */
    public function setItems(array $items);
}
