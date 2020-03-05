<?php

use Phinx\Migration\AbstractMigration;
use Phinx\Util\Literal;

class TimezoneTable extends AbstractMigration
{
    /**
     * Change Method.
     *
     * Write your reversible migrations using this method.
     *
     * More information on writing migrations is available here:
     * http://docs.phinx.org/en/latest/migrations.html#the-abstractmigration-class
     *
     * The following commands can be used in this method and Phinx will
     * automatically reverse them when rolling back:
     *
     *    createTable
     *    renameTable
     *    addColumn
     *    addCustomColumn
     *    renameColumn
     *    addIndex
     *    addForeignKey
     *
     * Any other destructive changes will result in an error when trying to
     * rollback the migration.
     *
     * Remember to call "create()" or "update()" and NOT "save()" when working
     * with the Table class.
     */
    public function change()
    {
		$timezone = $this->table('timezones');
    	$timezone->addColumn('region', 'string', ['limit' => 64])
      		->addColumn('abbreviation', 'string', ['limit' => 64])
			->addColumn('gmt_offset', 'integer')
      		->addColumn('dst', 'boolean', ['default' => false])
			->addColumn('created_at', 'timestamp', ['default' => Literal::from('now()')])
      		->addColumn('updated_at', 'timestamp', ['null' => true])
      		->create();
    }
}