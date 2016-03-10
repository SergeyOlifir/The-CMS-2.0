<?php

namespace Fuel\Migrations;

class Create_feedbacks
{
    public function up()
    {
        \DBUtil::create_table('feedbacks', array(
            'id' => array('constraint' => 11, 'type' => 'int', 'auto_increment' => true, 'unsigned' => true),
            'text' => array('type' => 'text', 'null' => true),
            'user_name' => array('constraint' => 150, 'type' => 'varchar', 'null' => true),
            'user_email' => array('constraint' => 150, 'type' => 'varchar', 'null' => true),
            'validated' => array('constraint' => 11, 'type' => 'int', 'null' => true),
            'created_at' => array('constraint' => 11, 'type' => 'int', 'null' => true),
            'updated_at' => array('constraint' => 11, 'type' => 'int', 'null' => true),
        ), array('id'));
    }

    public function down()
    {
        \DBUtil::drop_table('feedbacks');
    }
}