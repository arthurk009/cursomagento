<?php
/**
 * Copyright ©  All rights reserved.
 * See COPYING.txt for license details.
 */
declare(strict_types=1);

namespace Mentorias\Vacuna\Model;


class ConsultorioApiManagement implements \Mentorias\Vacuna\Api\ConsultorioApiManagementInterface
{

    //protected $_postFactory;
    protected $searchCriteriaBuilder;
    protected $filterBuilder;
    protected $consultorioRepository;
    private $resultJsonFactory;
    protected $postFactory;

    /**
     * @param \Magento\Framework\App\Action\Context $context
     * @param \Magento\Framework\Controller\Result\JsonFactory $resultJsonFactory
     */
    public function __construct(
        \Magento\Framework\App\Action\Context $context,
        \Magento\Framework\Controller\Result\JsonFactory $resultJsonFactory,
        \Mentorias\Vacuna\Model\ConsultorioFactory $postFactory,
        //\Mentorias\Vacuna\Model\ConsultorioRepository $consultorioRepository,
        \Mentorias\Vacuna\Api\ConsultorioRepositoryInterface $consultorioRepository,
        \Magento\Framework\Api\SearchCriteriaBuilder $searchCriteriaBuilder,
        \Magento\Framework\Api\FilterBuilder $filterBuilder
     )
     {
         $this->resultJsonFactory = $resultJsonFactory;
         $this->postFactory = $postFactory;
         $this->consultorioRepository = $consultorioRepository;
         $this->searchCriteriaBuilder = $searchCriteriaBuilder;
         $this->filterBuilder = $filterBuilder;
     }

    

    /**
     * 
     *
     * @return \Magento\Framework\Controller\Result\JsonFactory
     */
    public function postConsultorioApi($estadoId)
    {
       
        $filter[] = $this->filterBuilder
        ->setField('state_id')
        ->setConditionType('eq')
        ->setValue($estadoId)
        ->create();
     
        //Agregamos el filtro al objeto searchCriteria.
        $searchCriteria = $this->searchCriteriaBuilder->addFilters($filter);
        
        //Construimos la instancia del criterio de búsqueda y lo inyectamos en el método de listado del repositorio.
        $searchResults = $this->consultorioRepository->getList($searchCriteria->create())->getItems();

        $result = array();
        foreach ($searchResults as $product){
            $result[$product->getConsultorioId()]=$product->getConsultorioName();
        }

        return json_encode($result);

    }
}