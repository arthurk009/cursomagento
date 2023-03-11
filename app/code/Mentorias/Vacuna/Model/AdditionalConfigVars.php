<?php
namespace Mentorias\Vacuna\Model;
use \Magento\Checkout\Model\ConfigProviderInterface;


class AdditionalConfigVars implements ConfigProviderInterface
{

    protected $_helper;

    /**
     * @param \Magento\Framework\App\Action\Context $context
     */
    public function __construct(
        \Mentorias\Vacuna\Helper\Data $helper
		)
	{
        $this->_helper = $helper;
	}


   public function getConfig()
   {
       $additionalVariables = [
            'influenzaCovidConfig' =>[
                'influenzaCovidSku' => $this->_helper->getVacunaSku(),
                'aviso'             => 'Recuerde que en vacuna no hay reembolsos'
            ]
            ];
       return $additionalVariables;
   }
}