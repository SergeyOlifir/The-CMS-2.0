<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

//add_match_to_lang

namespace Fuel\Migrations;

class Add_match_to_lang
{
    public function up()
    {
        \DBUtil::add_fields('languages', array(
            'match' => array('type' => 'text', 'null' => false),
        ));
    }

    public function down()
    {
        \DBUtil::drop_fields('languages', 'match');
    }
}