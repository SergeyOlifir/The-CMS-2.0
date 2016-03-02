<?php

namespace Fuel\Migrations;

class Add_lang_to_mainpage
{
    public function up()
    {
        \DBUtil::add_fields('main_pages', array(
            'language_id' => array('type' => 'int', 'null' => true),
        ));
    }

    public function down()
    {
        \DBUtil::drop_fields('main_pages', 'language_id');
    }
}