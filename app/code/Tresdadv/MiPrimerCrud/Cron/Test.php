<?php

namespace Tresdadv\MiPrimerCrud\Cron;

class Test
{

	public function execute()
	{

		$writer = new \Zend\Log\Writer\Stream(BP . '/var/log/cron.log');
		$logger = new \Zend\Log\Logger();
		$logger->addWriter($writer);
		$logger->info(__METHOD__);

        // $writer = new \Zend_Log_Writer_Stream(BP . '/var/log/cron.log');
        // $logger = new \Zend_Log();
        // $logger->addWriter($writer);
        // $logger->info(__METHOD__);
		return $this;

	}
}