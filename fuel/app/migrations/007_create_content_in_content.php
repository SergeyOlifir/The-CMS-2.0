<?php

namespace Fuel\Migrations;

class Create_content_in_content
{
    public function up()
    {
        \DBUtil::create_table('content_in_content', array(
            'id' => array('constraint' => 11, 'type' => 'int', 'auto_increment' => true, 'unsigned' => true),
            'content_id' => array('constraint' => 11, 'type' => 'int', 'unsigned' => true),
            'related_content_id' => array('constraint' => 11, 'type' => 'int', 'unsigned' => true),
            'created_at' => array('constraint' => 11, 'type' => 'int', 'null' => true),
            'updated_at' => array('constraint' => 11, 'type' => 'int', 'null' => true),
        ), array('id'));
    }

    public function down()
    {
        \DBUtil::drop_table('content_in_content');
    }
}