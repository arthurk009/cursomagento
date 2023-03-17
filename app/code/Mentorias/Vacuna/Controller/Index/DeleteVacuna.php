<?php
namespace Mentorias\Vacuna\Controller\Index;

class DeleteVacuna extends \Magento\Framework\App\Action\Action
{
    
    protected $resultJsonFactory;
    protected $_postFactory;

    /**
     * @param \Magento\Framework\App\Action\Context $context
     * @param \Magento\Framework\Controller\Result\JsonFactory $resultJsonFactory
     */
    public function __construct(
       \Magento\Framework\App\Action\Context $context,
       \Magento\Framework\Controller\Result\JsonFactory $resultJsonFactory,
       \Mentorias\Vacuna\Model\VacunaFactory $postFactory
    )
    {
        $this->resultJsonFactory = $resultJsonFactory;
        $this->_postFactory = $postFactory;
        return parent::__construct($context);
    }

    /**
     * 
     *
     * @return \Magento\Framework\Controller\Result\JsonFactory
     */
    public function execute()
    {
        $res = false;
        $post = (array) $this->getRequest()->getPost();
        if (!empty($post)) {
            try{
                $model = $this->_postFactory->create()->load($post['id']);
                $model->delete();
            }catch(\Exception $e){
                
                die($e->getMessage());
            }
            
            return $this->resultJsonFactory->create()->setData(['result'=>true]);
        }
        return $this->resultJsonFactory->create()->setData(['result'=>$res]);
    }



}
