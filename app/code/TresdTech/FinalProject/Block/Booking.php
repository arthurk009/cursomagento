<?php
namespace TresdTech\FinalProject\Block;

class Booking extends \Magento\Framework\View\Element\Template
{


    // public function __construct(
	// 	\Magento\Framework\View\Element\Template\Context $context
	//     )
	// {
	// 	parent::__construct($context);
	// }

    // public function sayHello()
	// {
	// 	return __('Hello World');
	// }


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
            // companymodule is given in routes.xml
            // controller_name is folder name inside controller folder
            // action is php file name inside above controller_name folder
        return $this->getUrl('finalproject/index/booking', ['_secure' => true]);
        // here controller_name is index, action is booking
    }
}