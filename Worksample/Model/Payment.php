<?php

namespace MadePeople\Worksample\Model;

use MadePeople\Worksample\Api\Data\PaymentInterface;
use \Magento\Framework\Model\AbstractModel;
use Magento\Framework\DataObject\IdentityInterface;

/**
 * Class Payment
 * @package MadePeople\Worksample\Model
 */
class Payment extends AbstractModel implements PaymentInterface, IdentityInterface
{

    /**
     * CMS page cache tag
     */
    const CACHE_TAG = 'payment_details';

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
    protected $_eventObject = 'payment';

    /**
     * Name of object id field
     *
     * @var string
     */
    protected $_idFieldName = self::PAYMENT_ID;

    /**
     * Initialize resource model
     *
     * @return void
     */
    protected function _construct()
    {
        $this->_init('MadePeople\Worksample\Model\ResourceModel\Payment');
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
        return $this->getData(self::PAYMENT_ID);
    }

    /**
     * @return mixed
     */
    public function getOrder()
    {
        return $this->getData(self::ORDER);
    }

    /**
     * @return mixed
     */
    public function getTotalsum()
    {
        return $this->getData(self::TOTALSUM);
    }

    /**
     * @return mixed
     */
    public function getResult()
    {
        return $this->getData(self::RESULT);
    }

    /**
     * @return mixed
     */
    public function getFactorId()
    {
        return $this->getData(self::FACTOR_ID);
    }

    /**
     * Set ID
     *
     * @param int $id
     * @return \MadePeople\Worksample\Api\Data\PaymentInterface
     */
    public function setId($id)
    {
        return $this->setData(self::PAYMENT_ID, $id);
    }

    /**
     * @param $order
     * @return $this
     */
    public function setOrder($order)
    {
        return $this->setData(self::ORDER, $order);
    }

    /**
     * @param $totalsum
     * @return $this
     */
    public function setTotalsum($totalsum)
    {
        return $this->setData(self::TOTALSUM, $totalsum);
    }

    /**
     * @param $result
     * @return $this
     */
    public function setResult($result)
    {
        return $this->setData(self::RESULT, $result);
    }

}