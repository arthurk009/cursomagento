<?php
/**
 * Copyright ©  All rights reserved.
 * See COPYING.txt for license details.
 */
declare(strict_types=1);

namespace Mentorias\Vacuna\Model;

class VacunaApiManagement implements \Mentorias\Vacuna\Api\VacunaApiManagementInterface
{

    //protected $_postFactory;
    protected $searchCriteriaBuilder;
    protected $filterBuilder;
    protected $vacunaRepository;
    private $resultJsonFactory;
    protected $postFactory;

    /**
     * @param \Magento\Framework\App\Action\Context $context
     * @param \Magento\Framework\Controller\Result\JsonFactory $resultJsonFactory
     */
    public function __construct(
        // \Magento\Framework\App\Action\Context $context,
        // \Magento\Framework\Controller\Result\JsonFactory $resultJsonFactory,
        \Mentorias\Vacuna\Model\VacunaFactory $postFactory,
        \Mentorias\Vacuna\Api\VacunaRepositoryInterface $vacunaRepository,
        \Magento\Framework\Api\SearchCriteriaBuilder $searchCriteriaBuilder,
        \Magento\Framework\Api\FilterBuilder $filterBuilder
     )
     {
        //  $this->resultJsonFactory = $resultJsonFactory;
         $this->postFactory = $postFactory;
         $this->vacunaRepository = $vacunaRepository;
         $this->searchCriteriaBuilder = $searchCriteriaBuilder;
         $this->filterBuilder = $filterBuilder;
     }

    /**
     * {@inheritdoc}
     */
    public function postVacunaApi()
    {
        //return 'hello api POST return the $param ' . $param;

        $filter[] = $this->filterBuilder
        ->setField('name')
        ->setConditionType('neq')
        ->setValue('')
        ->create();
     
        //Agregamos el filtro al objeto searchCriteria.
        $searchCriteria = $this->searchCriteriaBuilder->addFilters($filter);
        
        //Construimos la instancia del criterio de búsqueda y lo inyectamos en el método de listado del repositorio.
        $searchResults = $this->vacunaRepository->getList($searchCriteria->create())->getItems();

        $result = array();
        foreach ($searchResults as $product){
            $result[]=$product->getData();
            //$result[$product->getConsultorioId()]=$product->getConsultorioName();
        }

        return json_encode($result);
    
    }
}
