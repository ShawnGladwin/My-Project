<?php

namespace MadePeople\Worksample\Api\Data;

/**
 * Interface FactorInterface
 * @package MadePeople\Worksample\Api\Data
 */
interface FactorInterface
{

    /**
     * Factor entity id
     */
    const FACTOR_ID = 'entity_id';

    /**
     * Decimal factor value
     */
    const FACTOR = 'factor';

    /**
     * @return mixed
     */
    public function getId();

    /**
     * @return mixed
     */
    public function getFactor();


    /**
     * @param $id
     * @return mixed
     */
    public function setId($id);

    /**
     * @param $factor
     * @return mixed
     */
    public function setFactor($factor);

}