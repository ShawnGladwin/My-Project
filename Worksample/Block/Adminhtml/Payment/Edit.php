<?php

namespace MadePeople\Worksample\Block\Adminhtml\Payment;

use Magento\Backend\Block\Widget\Form\Container;

/**
 * Class Edit
 * @package MadePeople\Worksample\Block\Adminhtml\Payment
 */
class Edit extends Container
{
    /**
     * Core registry
     *
     * @var \Magento\Framework\Registry
     */
    protected $_coreRegistry = null;

    /**
     * @param \Magento\Backend\Block\Widget\Context $context
     * @param \Magento\Framework\Registry $registry
     * @param array $data
     */
    public function __construct(
        \Magento\Backend\Block\Widget\Context $context,
        \Magento\Framework\Registry $registry,
        array $data = []
    )
    {
        $this->_coreRegistry = $registry;
        parent::__construct($context, $data);
    }

    /**
     * Payment edit block
     *
     * @return void
     */
    protected function _construct()
    {
        $this->_objectId = 'entity_id';
        $this->_blockGroup = 'MadePeople_Worksample';
        $this->_controller = 'adminhtml_payment';

        parent::_construct();

        if ($this->_isAllowedAction('MadePeople_Worksample::payment_save')) {
            $this->buttonList->update('save', 'label', __('Save Payment'));
            $this->buttonList->add(
                'saveandcontinue',
                [
                    'label' => __('Save and Continue Edit'),
                    'class' => 'save',
                    'data_attribute' => [
                        'mage-init' => [
                            'button' => ['event' => 'saveAndContinueEdit', 'target' => '#edit_form'],
                        ],
                    ]
                ],
                -100
            );
        } else {
            $this->buttonList->remove('save');
        }

    }

    /**
     * @return \Magento\Framework\Phrase
     */
    public function getHeaderText()
    {
        if ($this->_coreRegistry->registry('worksample_payment')->getId()) {
            return __("Edit Payment Details '%1'", $this->escapeHtml($this->_coreRegistry->registry('worksample_payment')->getTitle()));
        } else {
            return __('New Payment');
        }
    }

    /**
     * @param string $resourceId
     * @return bool
     */
    protected function _isAllowedAction($resourceId)
    {
        return $this->_authorization->isAllowed($resourceId);
    }

    /**
     * @return string
     */
    protected function _getSaveAndContinueUrl()
    {
        return $this->getUrl('worksample/*/save', ['_current' => true, 'back' => 'edit', 'active_tab' => '']);
    }
}