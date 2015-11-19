<?php

class Model_Category extends Model_Base {
    protected static $_properties = array(
        'id',
        'alias',
        'page_title',
        'title',
        'description',
        'all_caption',
        'meta',
        'image',
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
        'related_category' => array(
            'key_from' => 'id',
            'key_through_from' => 'category_id',
            'table_through' => 'category_in_category',
            'key_through_to' => 'related_category_id',
            'model_to' => 'Model_Category',
            'key_to' => 'id',
            'cascade_save' => true,
            'cascade_delete' => false,
        ),
        'master_category' => array(
            'key_from' => 'id',
            'key_through_from' => 'related_category_id',
            'table_through' => 'category_in_category',
            'key_through_to' => 'category_id',
            'model_to' => 'Model_Category',
            'key_to' => 'id',
            'cascade_save' => true,
            'cascade_delete' => false,
        )
    );
    
    protected static $_belongs_to = array(
        'logo' => array(
            'key_from' => 'image',
            'model_to' => 'Model_Image',
            'key_to' => 'id',
            'cascade_save' => true,
            'cascade_delete' => false,
        )
    );
    
    protected static $_has_many = array(
        'links' => array(
            'key_from' => 'id',
            'model_to' => 'Model_Link',
            'key_to' => 'category_id',
            'cascade_save' => true,
            'cascade_delete' => false,
        )
    );
    
    private static $validator;
    
    public static function get_validator () {
        if(!isset(self::$validator)) {
            $val = \Fuel\Core\Validation::forge('category');
            $val->add_field('alias', 'Alias', 'required|max_length[150]');
            $val->add_field('page_title', 'Page Title', 'max_length[150]');
            $val->add_field('title', 'Title', 'max_length[150]');
            $val->add_field('description', 'description', 'max_length[2000]');
            $val->add_field('meta', 'meta', 'max_length[2000]');
            $val->add_field('all_caption', 'all_caption', 'max_length[150]');
            self::$validator = $val;
        }
        
        return self::$validator;
    }
    
    public static function to_array_for_dropdown ($key, $value) {
        return Arr::assoc_to_keyval(\Fuel\Core\DB::select($key, $value)->from(self::table())->execute()->as_array(), $key, $value);
    }
}

