<?php

class Model_Translation extends Model_Base {
    protected static $_properties = array(
        'id',
        'item_type',
        'item_id',
        'language_id',
        'field_name',
        'content',
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
    
    protected static $_many_many = array(

    );
    
    protected static $_belongs_to = array(
        'language' => array(
            'key_from' => 'language_id',
            'model_to' => 'Model_Language',
            'key_to' => 'id',
            'cascade_save' => true,
            'cascade_delete' => false,
        )
    );
    
    protected static $_has_many = array(

    );
    
    private static $validator;
    
    public static function get_validator () {
        if(!isset(self::$validator)) {
            $val = \Fuel\Core\Validation::forge('category');
            $val->add_field('content', 'Translation Content', 'required|max_length[2000]');
            self::$validator = $val;
        }
        
        return self::$validator;
    }
}

