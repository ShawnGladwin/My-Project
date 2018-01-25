<?php

namespace MadePeople\Worksample\Controller\Adminhtml\Payment;

use Magento\Backend\App\Action\Context;
use Magento\Framework\View\Result\PageFactory;
use Magento\Backend\App\Action;

/**
 * Class Index
 * @package MadePeople\Worksample\Controller\Adminhtml\Payment
 */
class Index extends Action
{
    /**
     * @var PageFactory
     */
    protected $resultPageFactory;

    /**
     * @param Context $context
     * @param PageFactory $resultPageFactory
     */
    public function __construct(
        Context $context,
        PageFactory $resultPageFactory
    )
    {
        parent::__construct($context);
        $this->resultPageFactory = $resultPageFactory;
    }

    /**
     * Index action
     *
     * @return \Magento\Backend\Model\View\Result\Page
     */
    public function execute()
    {
        /** @var \Magento\Backend\Model\View\Result\Page $resultPage */
        $resultPage = $this->resultPageFactory->create();
        $resultPage->setActiveMenu('MadePeople_Worksample::payment');
        $resultPage->addBreadcrumb(__('Worksample'), __('Worksample'));
        $resultPage->addBreadcrumb(__('Manage Payment Details'), __('Manage Payment Details'));
        $resultPage->getConfig()->getTitle()->prepend(__('Payment'));

        return $resultPage;
    }
}