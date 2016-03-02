<?php

namespace Fuel\Migrations;

class Add_lang_to_category
{
    public function up()
    {
        \DBUtil::add_fields('categories', array(
            'language_id' => array('type' => 'int', 'null' => true),
        ));
    }

    public function down()
    {
        \DBUtil::drop_fields('categories', 'language_id');
    }
}