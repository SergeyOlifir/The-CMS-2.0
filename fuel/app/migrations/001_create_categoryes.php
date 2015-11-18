<?php

namespace Fuel\Migrations;

class Create_categoryes
{
    public function up()
    {
        \DBUtil::create_table('categories', array(
            'id' => array('constraint' => 11, 'type' => 'int', 'auto_increment' => true, 'unsigned' => true),
            'page_title' => array('constraint' => 150, 'type' => 'varchar', 'null' => true),
            'title' => array('constraint' => 150, 'type' => 'varchar', 'null' => true),
            'alias' => array('constraint' => 150, 'type' => 'varchar'),
            'all_caption' => array('constraint' => 150, 'type' => 'varchar'),
            'description' => array('type' => 'text', 'null' => true),
            'meta' => array('type' => 'text', 'null' => true),
            'image' => array('type' => 'text', 'null' => true),
            
            'created_at' => array('constraint' => 11, 'type' => 'int', 'null' => true),
            'updated_at' => array('constraint' => 11, 'type' => 'int', 'null' => true),

        ), array('id'));
    }

    public function down()
    {
        \DBUtil::drop_table('categories');
    }
}