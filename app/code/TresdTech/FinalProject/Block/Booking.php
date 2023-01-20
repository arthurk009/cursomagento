<?php
namespace TresdTech\FinalProject\Block;

class Booking extends \Magento\Framework\View\Element\Template
{



	public function __construct(
        \Magento\Backend\Block\Template\Context $context,
        array $data = []
    )
    {
        parent::__construct($context, $data);
       }

    /**
     * Get form action URL for POST booking request
     *
     * @return string
     */
    public function getFormAction()
    {
            
        return $this->getUrl('finalproject/index/booking', ['_secure' => true]);
        // here controller_name is index, action is booking
    }
}