<?php

namespace MadePeople\Worksample\Controller\Index;

/**
 * Class Index
 * @package MadePeople\Worksample\Controller\Index
 */
class Index extends \Magento\Framework\App\Action\Action
{

    /**
     * {@inheritdoc}
     */
    public function execute()
    {
        $this->_view->loadLayout();
        $this->_view->getLayout()->initMessages();
        $this->_view->renderLayout();
    }
}