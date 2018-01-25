<?php

namespace MadePeople\Worksample\Block\Adminhtml\Payment\Edit;

use \Magento\Backend\Block\Widget\Form\Generic;

/**
 * Class Form
 * @package MadePeople\Worksample\Block\Adminhtml\Payment\Edit
 */
class Form extends Generic
{

    /**
     * @var \Magento\Store\Model\System\Store
     */
    protected $_systemStore;

    /**
     * @var \Magento\Store\Model\System\Store
     */
    protected $_status;

    /**
     * @var \Magento\Store\Model\System\Store
     */
    protected $_factor;

    /**
     * @param \Magento\Backend\Block\Template\Context $context
     * @param \Magento\Framework\Registry $registry
     * @param \Magento\Framework\Data\FormFactory $formFactory
     * @param \Magento\Store\Model\System\Store $systemStore
     * @param array $data
     */
    public function __construct(
        \Magento\Backend\Block\Template\Context $context,
        \Magento\Framework\Registry $registry,
        \Magento\Framework\Data\FormFactory $formFactory,
        \Magento\Store\Model\System\Store $systemStore,
        array $data = []
    )
    {
        $this->_systemStore = $systemStore;
        parent::__construct($context, $registry, $formFactory, $data);
    }

    /**
     * Init form
     *
     * @return void
     */
    protected function _construct()
    {
        parent::_construct();
        $this->setId('payment_form');
        $this->setTitle(__('Payment Information'));
    }

    /**
     * Prepare form
     *
     * @return $this
     */
    protected function _prepareForm()
    {
        /** @var \MadePeople\Worksample\Model\Payment $model */
        $model = $this->_coreRegistry->registry('worksample_payment');

        /** @var \Magento\Framework\Data\Form $form */
        $form = $this->_formFactory->create(
            ['data' => ['id' => 'edit_form', 'action' => $this->getData('action'), 'method' => 'post']]
        );

        $form->setHtmlIdPrefix('payment_');

        $fieldset = $form->addFieldset(
            'base_fieldset',
            ['legend' => __('General Information'), 'class' => 'fieldset-wide']
        );

        if ($model->getId()) {
            $fieldset->addField('entity_id', 'hidden', ['name' => 'entity_id']);
        }

        $fieldset->addField(
            'order',
            'text',
            ['name' => 'title', 'label' => __('Order Id'), 'title' => __('Order Id'), 'required' => true]
        );

        $fieldset->addField(
            'totalsum',
            'text',
            ['name' => 'type', 'label' => __('Total Sum'), 'title' => __('Total Sum'), 'required' => true]
        );

        $fieldset->addField(
            'result',
            'text',
            ['name' => 'location', 'label' => __('Result'), 'title' => __('Result'), 'required' => true]
        );


        $form->setValues($model->getData());
        $form->setUseContainer(true);
        $this->setForm($form);

        return parent::_prepareForm();
    }
}