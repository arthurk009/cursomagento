<?php
/**
 * Copyright ©  All rights reserved.
 * See COPYING.txt for license details.
 */
declare(strict_types=1);

namespace Mentorias\Vacuna\Model;

use Magento\Framework\Api\SearchCriteria\CollectionProcessorInterface;
use Magento\Framework\Exception\CouldNotDeleteException;
use Magento\Framework\Exception\CouldNotSaveException;
use Magento\Framework\Exception\NoSuchEntityException;
use Mentorias\Vacuna\Api\Data\VacunaInterface;
use Mentorias\Vacuna\Api\Data\VacunaInterfaceFactory;
use Mentorias\Vacuna\Api\Data\VacunaSearchResultsInterfaceFactory;
use Mentorias\Vacuna\Api\VacunaRepositoryInterface;
use Mentorias\Vacuna\Model\ResourceModel\Vacuna as ResourceVacuna;
use Mentorias\Vacuna\Model\ResourceModel\Vacuna\CollectionFactory as VacunaCollectionFactory;

class VacunaRepository implements VacunaRepositoryInterface
{

    /**
     * @var ResourceVacuna
     */
    protected $resource;

    /**
     * @var Vacuna
     */
    protected $searchResultsFactory;

    /**
     * @var VacunaCollectionFactory
     */
    protected $vacunaCollectionFactory;

    /**
     * @var CollectionProcessorInterface
     */
    protected $collectionProcessor;

    /**
     * @var VacunaInterfaceFactory
     */
    protected $vacunaFactory;


    /**
     * @param ResourceVacuna $resource
     * @param VacunaInterfaceFactory $vacunaFactory
     * @param VacunaCollectionFactory $vacunaCollectionFactory
     * @param VacunaSearchResultsInterfaceFactory $searchResultsFactory
     * @param CollectionProcessorInterface $collectionProcessor
     */
    public function __construct(
        ResourceVacuna $resource,
        VacunaInterfaceFactory $vacunaFactory,
        VacunaCollectionFactory $vacunaCollectionFactory,
        VacunaSearchResultsInterfaceFactory $searchResultsFactory,
        CollectionProcessorInterface $collectionProcessor
    ) {
        $this->resource = $resource;
        $this->vacunaFactory = $vacunaFactory;
        $this->vacunaCollectionFactory = $vacunaCollectionFactory;
        $this->searchResultsFactory = $searchResultsFactory;
        $this->collectionProcessor = $collectionProcessor;
    }

    /**
     * @inheritDoc
     */
    public function save(VacunaInterface $vacuna)
    {
        try {
            $this->resource->save($vacuna);
        } catch (\Exception $exception) {
            throw new CouldNotSaveException(__(
                'Could not save the vacuna: %1',
                $exception->getMessage()
            ));
        }
        return $vacuna;
    }

    /**
     * @inheritDoc
     */
    public function get($vacunaId)
    {
        $vacuna = $this->vacunaFactory->create();
        $this->resource->load($vacuna, $vacunaId);
        if (!$vacuna->getId()) {
            throw new NoSuchEntityException(__('Vacuna with id "%1" does not exist.', $vacunaId));
        }
        return $vacuna;
    }

    /**
     * @inheritDoc
     */
    public function getList(
        \Magento\Framework\Api\SearchCriteriaInterface $criteria
    ) {
        $collection = $this->vacunaCollectionFactory->create();
        
        $this->collectionProcessor->process($criteria, $collection);
        
        $searchResults = $this->searchResultsFactory->create();
        $searchResults->setSearchCriteria($criteria);
        
        $items = [];
        foreach ($collection as $model) {
            $items[] = $model;
        }
        
        $searchResults->setItems($items);
        $searchResults->setTotalCount($collection->getSize());
        return $searchResults;
    }

    /**
     * @inheritDoc
     */
    public function delete(VacunaInterface $vacuna)
    {
        try {
            $vacunaModel = $this->vacunaFactory->create();
            $this->resource->load($vacunaModel, $vacuna->getVacunaId());
            $this->resource->delete($vacunaModel);
        } catch (\Exception $exception) {
            throw new CouldNotDeleteException(__(
                'Could not delete the Vacuna: %1',
                $exception->getMessage()
            ));
        }
        return true;
    }

    /**
     * @inheritDoc
     */
    public function deleteById($vacunaId)
    {
        return $this->delete($this->get($vacunaId));
    }
}
