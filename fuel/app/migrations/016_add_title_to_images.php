<?php

namespace Fuel\Migrations;

class Add_title_to_images
{
    public function up()
    {
        \DBUtil::add_fields('images', array(
            'title' => array('constraint' => 2000, 'type' => 'varchar', 'null' => true),
        ));
    }

    public function down()
    {
        \DBUtil::drop_fields('images', 'title');
    }
}