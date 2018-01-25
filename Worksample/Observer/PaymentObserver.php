<?php

namespace MadePeople\Worksample\Observer;

use Magento\Framework\Event\ObserverInterface;

/**
 * Class PaymentObserver
 * @package MadePeople\Worksample\Observer
 */
class PaymentObserver implements ObserverInterface
{
    /**
     * DB column to store config values
     */
    const FACTOR_FUNCTION_ENABLED = 'worksample/factor/enable';

    /**
     * @var \Magento\Sales\Api\Data\OrderInterface
     */
    protected $_order;
    /**
     * @var \Magento\Framework\App\ResourceConnection
     */
    protected $_resources;
    /**
     * @var \MadePeople\Worksample\Model\ResourceModel\Factor\CollectionFactory
     */
    protected $_factorCollectionFactory;
    /**
     * @var \Magento\Framework\App\Config\ScopeConfigInterface
     */
    protected $scopeConfig;

    /**
     * PaymentObserver constructor.
     * @param \Magento\Sales\Api\Data\OrderInterface $order
     */
    public function __construct(
        \Magento\Sales\Api\Data\OrderInterface $order,
        \Magento\Framework\App\ResourceConnection $_resources,
        \MadePeople\Worksample\Model\ResourceModel\Factor\CollectionFactory $factorCollectionFactory,
        \Magento\Framework\App\Config\ScopeConfigInterface $scopeConfig,
        array $data = []
    )
    {
        $this->_order = $order;
        $this->_resources = $_resources;
        $this->_factorCollectionFactory = $factorCollectionFactory;
        $this->scopeConfig = $scopeConfig;
    }

    /**
     * @param \Magento\Framework\Event\Observer $observer
     */
    public function execute(\Magento\Framework\Event\Observer $observer)
    {

        /** Current status of factor function  */
        $status = $this->scopeConfig->getValue(self::FACTOR_FUNCTION_ENABLED,
            \Magento\Store\Model\ScopeInterface::SCOPE_STORE);


        $orderIds = $observer->getEvent()->getOrderIds();

        // total sum
        $total = 0.0;
        // factor value
        $factor = 0.0;
        // order id
        $order = 0;

        /** Getting decimal factor value  */
        $data = $this->_factorCollectionFactory->create();
        foreach ($data as $item) {
            $factor = $item->getFactor();
        }

        /** Getting total sum  */
        foreach ($orderIds as $orderId) {
            $order = $this->_order->load($orderId);

            $total = $order->getGrandTotal();
        }

        if ($status && $factor) {
            /** Result value of multiplied order total by decimal factor */
            $result = $factor * $total;

            $objectManager = \Magento\Framework\App\ObjectManager::getInstance();
            $model = $objectManager->create('MadePeople\Worksample\Model\Payment');
            $model->setOrder($order->getId());
            $model->setTotalsum($total);
            $model->setResult($result);
            $model->save();
        }

    }

}