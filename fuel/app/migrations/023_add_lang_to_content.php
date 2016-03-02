<?php

namespace Fuel\Migrations;

class Add_lang_to_content
{
    public function up()
    {
        \DBUtil::add_fields('contents', array(
            'language_id' => array('type' => 'int', 'null' => true),
        ));
    }

    public function down()
    {
        \DBUtil::drop_fields('contents', 'language_id');
    }
}