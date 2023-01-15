<?php

namespace Tresdadv\MiPrimerCrud\Helper;
use \Magento\Framework\App\Helper\AbstractHelper;

class Data extends AbstractHelper
{
       public function getStoreConfig($num,$num2)
       {
               return $num*$num2;
       }
}