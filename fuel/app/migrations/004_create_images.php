<?php

namespace Fuel\Migrations;

class Create_images
{
	public function up()
	{
            \DBUtil::create_table('images', array(
                'id' => array('constraint' => 11, 'type' => 'int', 'auto_increment' => true),
                'origin' => array('constraint' => 255, 'type' => 'varchar'),
                'thumb' => array('constraint' => 255, 'type' => 'varchar'),
                'galery' => array('constraint' => 255, 'type' => 'varchar'),
                'full' => array('constraint' => 255, 'type' => 'varchar'),
                'list' => array('constraint' => 255, 'type' => 'varchar'),
                'tile' => array('constraint' => 255, 'type' => 'varchar'),
                'small' => array('constraint' => 255, 'type' => 'varchar'),
                'owner_id' => array('constraint' => 11, 'type' => 'int', 'null' => true),
                'owner_type' => array('constraint' => 255, 'type' => 'varchar', 'null' => true),
                'created_at' => array('constraint' => 11, 'type' => 'int', 'null' => true),
                'updated_at' => array('constraint' => 11, 'type' => 'int', 'null' => true),

            ), array('id'));
	}

	public function down()
	{
            \DBUtil::drop_table('images');
	}
}