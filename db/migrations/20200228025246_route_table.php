<?php

use Phinx\Migration\AbstractMigration;
use Phinx\Util\Literal;

class RouteTable extends AbstractMigration
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
		$users = $this->table('routes');
    	$users->addColumn('method', 'string', ['limit' => 16, 'default' => 'GET'])
      		->addColumn('path', 'string', ['limit' => 254])
			->addColumn('parameter', 'string', ['limit' => 254, 'null' => true])
			->addColumn('alias', 'string', ['limit' => 254])
      		->addColumn('caption', 'string', ['limit' => 254, 'null' => true])
      		->addColumn('category', 'string', ['limit' => 64, 'default' => 'HREF'])
      		->addColumn('parent', 'integer', ['null' => true])
      		->addColumn('sort_order', 'integer', ['default' => 1])
      		->addColumn('has_child', 'boolean', ['default' => false])
      		->addColumn('controller', 'string', ['limit' => 254])
      		->addColumn('function', 'string', ['limit' => 254])
			->addColumn('user_defined', 'boolean', ['default' => true])
			->addColumn('created_at', 'timestamp', ['default' => Literal::from('now()')])
      		->addColumn('updated_at', 'timestamp', ['null' => true])
      		->create();
    }
}
