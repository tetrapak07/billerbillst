<?php 

use Phalcon\Db\Column;
use Phalcon\Db\Index;
use Phalcon\Db\Reference;
use Phalcon\Mvc\Model\Migration;

class CustomersMigration_100 extends Migration
{

    public function up()
    {
        $this->morphTable(
            'customers',
            array(
            'columns' => array(
                new Column(
                    'id',
                    array(
                        'type' => Column::TYPE_INTEGER,
                        'notNull' => true,
                        'autoIncrement' => true,
                        'size' => 11,
                        'first' => true
                    )
                ),
                new Column(
                    'user_id',
                    array(
                        'type' => Column::TYPE_INTEGER,
                        'notNull' => true,
                        'size' => 11,
                        'after' => 'id'
                    )
                ),
                new Column(
                    'stripe_id',
                    array(
                        'type' => Column::TYPE_VARCHAR,
                        'notNull' => true,
                        'size' => 60,
                        'after' => 'user_id'
                    )
                ),
                new Column(
                    'token',
                    array(
                        'type' => Column::TYPE_VARCHAR,
                        'notNull' => true,
                        'size' => 60,
                        'after' => 'stripe_id'
                    )
                ),
                new Column(
                    'created_at',
                    array(
                        'type' => Column::TYPE_DATETIME,
                        'size' => 1,
                        'after' => 'token'
                    )
                ),
                new Column(
                    'updated_at',
                    array(
                        'type' => Column::TYPE_DATETIME,
                        'size' => 1,
                        'after' => 'created_at'
                    )
                )
            ),
            'indexes' => array(
                new Index('PRIMARY', array('id'))
            ),
            'options' => array(
                'TABLE_TYPE' => 'BASE TABLE',
                'AUTO_INCREMENT' => '2',
                'ENGINE' => 'InnoDB',
                'TABLE_COLLATION' => 'latin1_swedish_ci'
            )
        )
        );
    }
}
