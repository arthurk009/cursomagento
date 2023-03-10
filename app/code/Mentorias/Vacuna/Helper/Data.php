<?php
namespace Mentorias\Vacuna\Helper;
use \Magento\Framework\App\Helper\AbstractHelper;


class Data extends AbstractHelper
{

    protected $_customerSession;
    protected $productRepository;
    const SKUID ='20230228COVINF';

    
    public function __construct(
        \Magento\Customer\Model\Session $session,
        \Magento\Catalog\Api\ProductRepositoryInterface $productRepository
    )
    {
        $this->_customerSession = $session;
        $this->productRepository = $productRepository;
    }

    public function getInformationVacuna($step ='step1')
    {
            return $this->_customerSession->getData($step);
    }

    /** 
     * @param array $myarray
     * @return string
    */
    public function getVacunaSku(): string
    {
        return self::SKUID;
    }

    public function getVacunaProduct(){
        $skuId ='20230228COVINF';
        return $this->productRepository->get($skuId);
    }
}
