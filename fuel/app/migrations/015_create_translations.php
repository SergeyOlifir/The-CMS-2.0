<?php

namespace Fuel\Migrations;

class Create_translations
{
    public function up()
    {
        \DBUtil::create_table('translations', array(
            'id' => array('constraint' => 11, 'type' => 'int', 'auto_increment' => true, 'unsigned' => true),
            'item_type' => array('constraint' => 150, 'type' => 'varchar', 'null' => false),
            'item_id' => array('constraint' => 11, 'type' => 'int', 'null' => true),
            'language_id' => array('constraint' => 11, 'type' => 'int', 'null' => true),
            'field_name' => array('constraint' => 150, 'type' => 'varchar', 'null' => false),
            'content' => array('type' => 'text', 'null' => true),

            'created_at' => array('constraint' => 11, 'type' => 'int', 'null' => true),
            'updated_at' => array('constraint' => 11, 'type' => 'int', 'null' => true),

        ), array('id'));
    }

    public function down()
    {
        \DBUtil::drop_table('translations');
    }
}