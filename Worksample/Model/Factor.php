<?php

namespace MadePeople\Worksample\Model;

use \Magento\Framework\Model\AbstractModel;
use MadePeople\Worksample\Api\Data\FactorInterface;
use Magento\Framework\DataObject\IdentityInterface;

/**
 * Class Factor
 * @package MadePeople\Worksample\Model
 */
class Factor extends AbstractModel implements FactorInterface, IdentityInterface
{

    /**
     * CMS page cache tag
     */
    const CACHE_TAG = 'payment_factor';

    /**
     * Prefix of model events names
     *
     * @var string
     */
    protected $_eventPrefix = 'worksample';

    /**
     * Name of the event object
     *
     * @var string
     */
    protected $_eventObject = 'factor';

    /**
     * Name of object id field
     *
     * @var string
     */
    protected $_idFieldName = self::FACTOR_ID;

    /**
     * Initialize resource model
     *
     * @return void
     */
    protected function _construct()
    {
        $this->_init('MadePeople\Worksample\Model\ResourceModel\Factor');
    }

    /**
     * Return unique ID(s) for each object in system
     *
     * @return array
     */
    public function getIdentities()
    {
        return [self::CACHE_TAG . '_' . $this->getId()];
    }

    /**
     * Get ID
     *
     * @return int|null
     */
    public function getId()
    {
        return $this->getData(self::FACTOR_ID);
    }

    /**
     * @return mixed
     */
    public function getFactor()
    {
        return $this->getData(self::FACTOR);
    }

    /**
     * Set ID
     *
     * @param int $id
     * @return \MadePeople\Worksample\Api\Data\FactorInterface
     */
    public function setId($id)
    {
        return $this->setData(self::FACTOR_ID, $id);
    }

    /**
     * @param $factor
     * @return $this
     */
    public function setFactor($factor)
    {
        return $this->setData(self::FACTOR, $factor);
    }

}