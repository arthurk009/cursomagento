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
use Mentorias\Vacuna\Api\ConsultorioRepositoryInterface;
use Mentorias\Vacuna\Api\Data\ConsultorioInterface;
use Mentorias\Vacuna\Api\Data\ConsultorioInterfaceFactory;
use Mentorias\Vacuna\Api\Data\ConsultorioSearchResultsInterfaceFactory;
use Mentorias\Vacuna\Model\ResourceModel\Consultorio as ResourceConsultorio;
use Mentorias\Vacuna\Model\ResourceModel\Consultorio\CollectionFactory as ConsultorioCollectionFactory;

class ConsultorioRepository implements ConsultorioRepositoryInterface
{

    /**
     * @var ConsultorioCollectionFactory
     */
    protected $consultorioCollectionFactory;

    /**
     * @var Consultorio
     */
    protected $searchResultsFactory;

    /**
     * @var ConsultorioInterfaceFactory
     */
    protected $consultorioFactory;

    /**
     * @var ResourceConsultorio
     */
    protected $resource;

    /**
     * @var CollectionProcessorInterface
     */
    protected $collectionProcessor;


    /**
     * @param ResourceConsultorio $resource
     * @param ConsultorioInterfaceFactory $consultorioFactory
     * @param ConsultorioCollectionFactory $consultorioCollectionFactory
     * @param ConsultorioSearchResultsInterfaceFactory $searchResultsFactory
     * @param CollectionProcessorInterface $collectionProcessor
     */
    public function __construct(
        ResourceConsultorio $resource,
        ConsultorioInterfaceFactory $consultorioFactory,
        ConsultorioCollectionFactory $consultorioCollectionFactory,
        ConsultorioSearchResultsInterfaceFactory $searchResultsFactory,
        CollectionProcessorInterface $collectionProcessor
    ) {
        $this->resource = $resource;
        $this->consultorioFactory = $consultorioFactory;
        $this->consultorioCollectionFactory = $consultorioCollectionFactory;
        $this->searchResultsFactory = $searchResultsFactory;
        $this->collectionProcessor = $collectionProcessor;
    }

    /**
     * @inheritDoc
     */
    public function save(ConsultorioInterface $consultorio)
    {
        try {
            $this->resource->save($consultorio);
        } catch (\Exception $exception) {
            throw new CouldNotSaveException(__(
                'Could not save the consultorio: %1',
                $exception->getMessage()
            ));
        }
        return $consultorio;
    }

    /**
     * @inheritDoc
     */
    public function get($consultorioId)
    {
        $consultorio = $this->consultorioFactory->create();
        $this->resource->load($consultorio, $consultorioId);
        if (!$consultorio->getId()) {
            throw new NoSuchEntityException(__('Consultorio with id "%1" does not exist.', $consultorioId));
        }
        return $consultorio;
    }

    /**
     * @inheritDoc
     */
    public function getList(
        \Magento\Framework\Api\SearchCriteriaInterface $criteria
    ) {
        $collection = $this->consultorioCollectionFactory->create();
        
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
    public function delete(ConsultorioInterface $consultorio)
    {
        try {
            $consultorioModel = $this->consultorioFactory->create();
            $this->resource->load($consultorioModel, $consultorio->getConsultorioId());
            $this->resource->delete($consultorioModel);
        } catch (\Exception $exception) {
            throw new CouldNotDeleteException(__(
                'Could not delete the Consultorio: %1',
                $exception->getMessage()
            ));
        }
        return true;
    }

    /**
     * @inheritDoc
     */
    public function deleteById($consultorioId)
    {
        return $this->delete($this->get($consultorioId));
    }
}