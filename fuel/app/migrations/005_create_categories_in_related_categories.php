<?php

namespace Fuel\Migrations;

class Create_categories_in_related_categories
{
    public function up()
    {
        \DBUtil::create_table('categories_in_related_categories', array(
            'id' => array('constraint' => 11, 'type' => 'int', 'auto_increment' => true, 'unsigned' => true),
            'category_id' => array('constraint' => 11, 'type' => 'int', 'unsigned' => true),
            'related_category_id' => array('constraint' => 11, 'type' => 'int', 'unsigned' => true),
            'created_at' => array('constraint' => 11, 'type' => 'int', 'null' => true),
            'updated_at' => array('constraint' => 11, 'type' => 'int', 'null' => true),
        ), array('id'));
    }

    public function down()
    {
        \DBUtil::drop_table('categories_in_related_categories');
    }
}

