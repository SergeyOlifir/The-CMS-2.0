<?php

namespace Fuel\Migrations;

class Create_contents
{
    public function up()
    {
        \DBUtil::create_table('contents', array(
            'id' => array('constraint' => 11, 'type' => 'int', 'auto_increment' => true, 'unsigned' => true),
            'page_title' => array('constraint' => 150, 'type' => 'varchar', 'null' => true),
            'title' => array('constraint' => 150, 'type' => 'varchar', 'null' => true),
            'description' => array('type' => 'text', 'null' => true),
            'meta' => array('type' => 'text', 'null' => true),
            'image' => array('type' => 'text', 'null' => true),
            'content' => array('type' => 'text', 'null' => true),
            'created_at' => array('constraint' => 11, 'type' => 'int', 'null' => true),
            'updated_at' => array('constraint' => 11, 'type' => 'int', 'null' => true),

        ), array('id'));
    }

    public function down()
    {
        \DBUtil::drop_table('contents');
    }
}