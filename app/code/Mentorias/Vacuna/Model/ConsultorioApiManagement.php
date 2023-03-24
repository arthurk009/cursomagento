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
        \Mentorias\Vacuna\Model\ConsultorioFactory $postFactory
     )
     {
         $this->resultJsonFactory = $resultJsonFactory;
         $this->postFactory = $postFactory;
     }

    

    /**
     * 
     *
     * @return \Magento\Framework\Controller\Result\JsonFactory
     */
    public function postConsultorioApi($estadoId)
    {

        $resCollection = $this->postFactory->create();
        $collection = $resCollection->getCollection();
        $collection->addFieldToFilter('state_id', array('eq' => $estadoId))
                    ->addFieldToSelect('consultorio_id')
                    ->addFieldToSelect('consultorio_name');
        $resCollection = $collection->toArray();
        $result = array();
                foreach($resCollection['items'] as $it){
                    $result[$it['consultorio_id']]=$it['consultorio_name'];
                }
       
        return json_encode($result);

    }
}