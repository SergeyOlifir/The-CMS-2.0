<?php

namespace Fuel\Migrations;

class Add_footer_content
{
    public function up()
    {
        \DBUtil::add_fields('main_pages', array(
            'footer_content' => array('type' => 'text', 'null' => false),
        ));
    }

    public function down()
    {
        \DBUtil::drop_fields('main_pages', 'footer_content');
    }
}