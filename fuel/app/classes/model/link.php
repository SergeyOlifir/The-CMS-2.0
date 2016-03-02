<?php

class Model_Link extends Model_Base {
    protected static $_properties = array(
        'id',
        'title',
        'description',
        'category_id',
        'image',
        'weight',
        'language_id',
        'created_at',
        'updated_at',
    );
    
    protected static $_observers = array(
        'Orm\Observer_CreatedAt' => array(
                'events' => array('before_insert'),
                'mysql_timestamp' => false,
        ),
        'Orm\Observer_UpdatedAt' => array(
                'events' => array('before_save'),
                'mysql_timestamp' => false,
        ),
    );
    
    protected static $_belongs_to = array(
        'category' => array(
            'key_from' => 'category_id',
            'model_to' => 'Model_Category',
            'key_to' => 'id',
            'cascade_save' => true,
            'cascade_delete' => false,
        ),
        'logo' => array(
            'key_from' => 'image',
            'model_to' => 'Model_Image',
            'key_to' => 'id',
            'cascade_save' => true,
            'cascade_delete' => false,
        ),
        'language' => array(
            'key_from' => 'language_id',
            'model_to' => 'Model_Language',
            'key_to' => 'id',
            'cascade_save' => true,
            'cascade_delete' => false,
        ),
    );
    
    private static $validator;
    
    public static function get_validator () {
        if(!isset(self::$validator)) {
            $val = \Fuel\Core\Validation::forge('link');
            $val->add_field('title', 'Title', 'max_length[150]');
            $val->add_field('description', 'description', 'max_length[2000]');
            $val->add_field('category_id', 'category_id', 'required|numeric|max_length[11]');
            $val->add_field('weight', 'weight', 'required|numeric|max_length[11]');
            $val->add_field('language_id', 'language', 'max_length[11]');
            self::$validator = $val;
        }
        
        return self::$validator;
    }
}

