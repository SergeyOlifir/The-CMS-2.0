<?php

namespace Fuel\Migrations;

class Add_lang_to_link
{
    public function up()
    {
        \DBUtil::add_fields('links', array(
            'language_id' => array('type' => 'int', 'null' => true),
        ));
    }

    public function down()
    {
        \DBUtil::drop_fields('links', 'language_id');
    }
}