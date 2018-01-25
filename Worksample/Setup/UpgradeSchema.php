<?php

namespace MadePeople\Worksample\Setup;

use Magento\Framework\Setup\UpgradeSchemaInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\SchemaSetupInterface;
use Magento\Framework\DB\Ddl\Table;

/**
 * Class UpgradeSchema
 * @package MadePeople\Worksample\Setup
 */
class UpgradeSchema implements UpgradeSchemaInterface
{
    /**
     * Upgrades DB schema for a module
     *
     * @param SchemaSetupInterface $setup
     * @param ModuleContextInterface $context
     * @return void
     */
    public function upgrade(SchemaSetupInterface $setup, ModuleContextInterface $context)
    {
        $installer = $setup;
        $installer->startSetup();

        if (version_compare($context->getVersion(), '1.0.0') < 0) {

            /**
             * Create table 'madepeople_payment'
             */
            $tableName = $installer->getTable('madepeople_payment');
            $tableComment = 'Payment data summary and multiplied by factor result';
            $columns = array(
                'entity_id' => array(
                    'type' => Table::TYPE_INTEGER,
                    'size' => null,
                    'options' => array('identity' => true, 'unsigned' => true, 'nullable' => false, 'primary' => true),
                    'comment' => 'Payment Id',
                ),
                'order' => array(
                    'type' => Table::TYPE_INTEGER,
                    'size' => null,
                    'options' => array('nullable' => false),
                    'comment' => 'Clients Order Id',
                ),
                'totalsum' => array(
                    'type' => Table::TYPE_FLOAT,
                    'size' => null,
                    'options' => array('nullable' => false),
                    'comment' => 'Order Sum Grand Total',
                ),
                'result' => array(
                    'type' => Table::TYPE_FLOAT,
                    'size' => null,
                    'options' => array('nullable' => true),
                    'comment' => 'Total Sum Multiplied by Decimal Factor Value Result',
                ),
                'factor_id' => array(
                    'type' => Table::TYPE_INTEGER,
                    'size' => null,
                    'options' => array('unsigned' => true),
                    'comment' => 'Decimal Factor Value linked to the payment',
                ),
            );


            $foreignKeys = array(
                'factor_id' => array(
                    'ref_table' => 'MadePeople_factor',
                    'ref_column' => 'entity_id',
                    'on_delete' => Table::ACTION_CASCADE,
                )
            );


            $table = $installer->getConnection()->newTable($tableName);

            foreach ($columns AS $name => $values) {
                $table->addColumn(
                    $name,
                    $values['type'],
                    $values['size'],
                    $values['options'],
                    $values['comment']
                );
            }

            foreach ($foreignKeys AS $column => $foreignKey) {
                $table->addForeignKey(
                    $installer->getFkName($tableName, $column, $foreignKey['ref_table'], $foreignKey['ref_column']),
                    $column,
                    $foreignKey['ref_table'],
                    $foreignKey['ref_column'],
                    $foreignKey['on_delete']
                );
            }

            $table->setComment($tableComment);

            $installer->getConnection()->createTable($table);
        }

        $installer->endSetup();
    }
}