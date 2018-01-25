<?php

namespace MadePeople\Worksample\Setup;

use Magento\Framework\Setup\InstallSchemaInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\SchemaSetupInterface;
use Magento\Framework\DB\Ddl\Table;

/**
 * Class InstallSchema
 * @package MadePeople\Worksample\Setup
 */
class InstallSchema implements InstallSchemaInterface
{
    /**
     * Installs DB schema for a module
     *
     * @param SchemaSetupInterface $setup
     * @param ModuleContextInterface $context
     * @return void
     */
    public function install(SchemaSetupInterface $setup, ModuleContextInterface $context)
    {
        $installer = $setup;
        $installer->startSetup();

        /**
         * Create table 'MadePeople_factor'
         */
        $tableName = $installer->getTable('madepeople_factor');
        $tableComment = 'Decimal Factor Value Management';
        $columns = array(
            'entity_id' => array(
                'type' => Table::TYPE_INTEGER,
                'size' => null,
                'options' => array('identity' => true, 'unsigned' => true, 'nullable' => false, 'primary' => true),
                'comment' => 'Factor Id',
            ),
            'factor' => array(
                'type' => Table::TYPE_FLOAT,
                'size' => 255,
                'options' => array('nullable' => true),
                'comment' => 'Decimal Factor Value',
            ),
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

        $table->setComment($tableComment);

        $installer->getConnection()->createTable($table);

        $installer->endSetup();
    }

}