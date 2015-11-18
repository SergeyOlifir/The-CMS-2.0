<?php

namespace Fuel\Migrations;

class Create_links
{
    public function up()
    {
        \DBUtil::create_table('links', array(
            'id' => array('constraint' => 11, 'type' => 'int', 'auto_increment' => true, 'unsigned' => true),
            'title' => array('constraint' => 150, 'type' => 'varchar', 'null' => true),
            'description' => array('type' => 'text', 'null' => true),
            'category_id' => array('constraint' => 11, 'type' => 'int'),
            'weight' => array('constraint' => 11, 'type' => 'int'),
            'image' => array('type' => 'text', 'null' => true),
            
            'created_at' => array('constraint' => 11, 'type' => 'int', 'null' => true),
            'updated_at' => array('constraint' => 11, 'type' => 'int', 'null' => true),

        ), array('id'));
    }

    public function down()
    {
        \DBUtil::drop_table('links');
    }
}