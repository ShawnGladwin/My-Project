<?php

namespace MadePeople\Worksample\Controller\Adminhtml\Factor;

use Magento\Backend\App\Action\Context;
use Magento\Framework\View\Result\PageFactory;
use Magento\Backend\App\Action;

/**
 * Class Index
 * @package MadePeople\Worksample\Controller\Adminhtml\Factor
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
     * @return \Magento\Backend\Model\View\Result\Page
     */
    public function execute()
    {
        /** @var \Magento\Backend\Model\View\Result\Page $resultPage */
        $resultPage = $this->resultPageFactory->create();
        $resultPage->setActiveMenu('MadePeople_Worksample::factor');
        $resultPage->addBreadcrumb(__('Worksample'), __('Worksample'));
        $resultPage->addBreadcrumb(__('Manage Factor'), __('Manage Factor'));
        $resultPage->getConfig()->getTitle()->prepend(__('Factor'));

        return $resultPage;
    }
}