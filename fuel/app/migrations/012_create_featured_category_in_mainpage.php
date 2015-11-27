<?php

namespace Fuel\Migrations;

class Create_featured_category_in_mainpage
{
    public function up()
    {
        \DBUtil::create_table('featured_category_in_mainpage', array(
            'id' => array('constraint' => 11, 'type' => 'int', 'auto_increment' => true, 'unsigned' => true),
            'main_id' => array('constraint' => 11, 'type' => 'int', 'unsigned' => true),
            'category_id' => array('constraint' => 11, 'type' => 'int', 'unsigned' => true),
            'type' => array('constraint' => 11, 'type' => 'int'),
            'created_at' => array('constraint' => 11, 'type' => 'int', 'null' => true),
            'updated_at' => array('constraint' => 11, 'type' => 'int', 'null' => true),
        ), array('id'));
    }

    public function down()
    {
        \DBUtil::drop_table('featured_category_in_mainpage');
    }
}
