<?php

namespace MadePeople\Worksample\Model\ResourceModel\Factor;

use \Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;

/**
 * Class Collection
 * @package MadePeople\Worksample\Model\ResourceModel\Factor
 */
class Collection extends AbstractCollection
{
    /**
     * @var string
     */
    protected $_idFieldName = \MadePeople\Worksample\Model\Factor::FACTOR_ID;

    /**
     * Define resource model
     *
     * @return void
     */
    protected function _construct()
    {
        $this->_init('MadePeople\Worksample\Model\Factor', 'MadePeople\Worksample\Model\ResourceModel\Factor');
    }

}