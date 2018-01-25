<?php

namespace MadePeople\Worksample\Setup;

use MadePeople\Worksample\Model\Factor;
use Magento\Framework\Setup\UpgradeDataInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\ModuleDataSetupInterface;

/**
 * @codeCoverageIgnore
 */
class UpgradeData implements UpgradeDataInterface
{

    /**
     * @var Factor
     */
    protected $_factor;

    /**
     * UpgradeData constructor.
     * @param Factor $factor
     */
    public function __construct(Factor $factor)
    {
        $this->_factor = $factor;
    }

    /**
     * {@inheritdoc}
     * @SuppressWarnings(PHPMD.ExcessiveMethodLength)
     */
    public function upgrade(ModuleDataSetupInterface $setup, ModuleContextInterface $context)
    {
        $installer = $setup;
        $installer->startSetup();

        if (version_compare($context->getVersion(), '1.0.1') < 0) {
            $factor = [
                [
                    'factor' => '7',
                ]
            ];

            /**
             * Insert factor
             */
            $factorIds = array();
            foreach ($factor as $data) {
                $factor = $this->_factor->setData($data)->save();
                $factorIds[] = $factor->getId();
            }

            $installer->endSetup();
        }
    }
}