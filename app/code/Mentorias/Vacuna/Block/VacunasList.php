<?php
namespace Mentorias\Vacuna\Block;



class VacunasList extends \Magento\Framework\View\Element\Template
{
    /**
     * @var \Magento\Framework\View\Result\PageFactory
     */
    protected $_postFactory;

    /**
     * @param \Magento\Framework\View\Element\Template\Context $context
     * @param array $data
     */
	public function __construct(
		\Magento\Framework\View\Element\Template\Context $context,
		\Mentorias\Vacuna\Model\VacunaFactory $postFactory
	)
	{
		$this->_postFactory = $postFactory;
		parent::__construct($context);
	}

    public function getPostCollection(){
		$post = $this->_postFactory->create();
		return $post->getCollection();
	}


    
}
