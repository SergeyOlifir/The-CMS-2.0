<?php

namespace Fuel\Migrations;

class Create_languages
{
    public function up()
    {
        \DBUtil::create_table('languages', array(
            'id' => array('constraint' => 11, 'type' => 'int', 'auto_increment' => true, 'unsigned' => true),
            'name' => array('constraint' => 150, 'type' => 'varchar', 'null' => false),
            'code' => array('constraint' => 4, 'type' => 'varchar', 'null' => false),
            'image' => array('type' => 'text', 'null' => true),

            'created_at' => array('constraint' => 11, 'type' => 'int', 'null' => true),
            'updated_at' => array('constraint' => 11, 'type' => 'int', 'null' => true),

        ), array('id'));
    }

    public function down()
    {
        \DBUtil::drop_table('languages');
    }
}