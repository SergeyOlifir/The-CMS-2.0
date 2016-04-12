<?php

namespace Fuel\Migrations;

class Create_Main_Page
{
    public function up()
    {
        \DBUtil::create_table('main_pages', array(
            'id' => array('constraint' => 11, 'type' => 'int', 'auto_increment' => true, 'unsigned' => true),
            'title' => array('constraint' => 150, 'type' => 'varchar', 'null' => true),
            'meta' => array('type' => 'text', 'null' => true),
            
            'created_at' => array('constraint' => 11, 'type' => 'int', 'null' => true),
            'updated_at' => array('constraint' => 11, 'type' => 'int', 'null' => true),

        ), array('id'));
        
        /*$model = \Model_MainPage::forge(array(
            'title' => '',
            'meta' => '',
        ));
        
        $model->save();*/
        
    }

    public function down()
    {
        \DBUtil::drop_table('main_pages');
    }
}