<?php

namespace MadePeople\Worksample\Api\Data;

/**
 * Interface PaymentInterface
 * @package MadePeople\Worksample\Api\Data
 */
interface PaymentInterface
{
    /**
     * Payment entity id
     */
    const PAYMENT_ID = 'entity_id';
    /**
     * Order id
     */
    const ORDER = 'order';
    /**
     * Total sum of purchase
     */
    const TOTALSUM = 'totalsum';
    /**
     * Result of multiplied total sum by factor value
     */
    const RESULT = 'result';
    /**
     * Factor id
     */
    const FACTOR_ID = 'factor_id';

    /**
     * @return int
     */
    public function getId();

    /**
     * @return mixed
     */
    public function getOrder();

    /**
     * @return mixed
     */
    public function getTotalsum();

    /**
     * @return mixed
     */
    public function getResult();

    /**
     * @return mixed
     */
    public function getFactorId();


    /**
     * @param $id
     * @return mixed
     */
    public function setId($id);

    /**
     * @param $order
     * @return mixed
     */
    public function setOrder($order);

    /**
     * @param $totalsum
     * @return mixed
     */
    public function setTotalsum($totalsum);

    /**
     * @param $result
     * @return mixed
     */
    public function setResult($result);


}