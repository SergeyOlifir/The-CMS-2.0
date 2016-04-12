<?php

namespace Fuel\Migrations;

class Create_Default_Main_Page
{
    public function up()
    {
        
        
        $model = \Model_MainPage::forge(array(
            'title' => '',
            'meta' => '',
            'footer_content' => '',
        ));
        
        $model->save();
        
    }

    public function down()
    {
        //\DBUtil::drop_table('main_pages');
    }
}