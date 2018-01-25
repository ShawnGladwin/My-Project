<?php

namespace MadePeople\Worksample\Controller\Adminhtml\Payment;

use Magento\Backend\App\Action;

/**
 * Class Delete
 * @package MadePeople\Worksample\Controller\Adminhtml\Payment
 */
class Delete extends Action
{
    /**
     * @var \MadePeople\Worksample\Model\Payment
     */
    protected $_model;

    /**
     * @param Action\Context $context
     * @param \MadePeople\Worksample\Model\Payment $model
     */
    public function __construct(
        Action\Context $context,
        \MadePeople\Worksample\Model\Payment $model
    )
    {
        parent::__construct($context);
        $this->_model = $model;
    }

    /**
     * {@inheritdoc}
     */
    protected function _isAllowed()
    {
        return $this->_authorization->isAllowed('MadePeople_Worksample::payment_delete');
    }

    /**
     * Delete action
     *
     * @return \Magento\Framework\Controller\ResultInterface
     */
    public function execute()
    {
        $id = $this->getRequest()->getParam('id');
        /** @var \Magento\Backend\Model\View\Result\Redirect $resultRedirect */
        $resultRedirect = $this->resultRedirectFactory->create();
        if ($id) {
            try {
                $model = $this->_model;
                $model->load($id);
                $model->delete();
                $this->messageManager->addSuccess(__('Payment deleted'));
                return $resultRedirect->setPath('*/*/');
            } catch (\Exception $e) {
                $this->messageManager->addError($e->getMessage());
                return $resultRedirect->setPath('*/*/edit', ['id' => $id]);
            }
        }
        $this->messageManager->addError(__('Payment does not exist'));
        return $resultRedirect->setPath('*/*/');
    }
}