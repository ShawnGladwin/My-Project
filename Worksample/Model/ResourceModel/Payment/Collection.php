<?php

namespace MadePeople\Worksample\Model\ResourceModel\Payment;

use \Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;

/**
 * Class Collection
 * @package MadePeople\Worksample\Model\ResourceModel\Payment
 */
class Collection extends AbstractCollection
{
    /**
     * @var string
     */
    protected $_idFieldName = \MadePeople\Worksample\Model\Payment::PAYMENT_ID;

    /**
     * Define resource model
     *
     * @return void
     */
    protected function _construct()
    {
        $this->_init('MadePeople\Worksample\Model\Payment', 'MadePeople\Worksample\Model\ResourceModel\Payment');
    }

}