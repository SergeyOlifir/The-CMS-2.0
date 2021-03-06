<?php

class Model_Content extends Model_Base {
    protected static $_properties = array(
        'id',
        'page_title',
        'title',
        'description',
        'content',
        'meta',
        'image',
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
    
    protected static $_many_many = array(
        /*'subsidiary_category' => array(
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
        ),*/
        'related_content' => array(
            'key_from' => 'id',
            'key_through_from' => 'content_id',
            'table_through' => 'content_in_content',
            'key_through_to' => 'related_content_id',
            'model_to' => 'Model_Content',
            'key_to' => 'id',
            'cascade_save' => true,
            'cascade_delete' => false,
        ),
        'related_to_content' => array(
            'key_from' => 'id',
            'key_through_from' => 'related_content_id',
            'table_through' => 'content_in_content',
            'key_through_to' => 'content_id',
            'model_to' => 'Model_Content',
            'key_to' => 'id',
            'cascade_save' => true,
            'cascade_delete' => false,
        ),
        
        'master_categories' => array(
            'key_from' => 'id',
            'key_through_from' => 'content_id',
            'table_through' => 'content_in_category',
            'key_through_to' => 'category_id',
            'model_to' => 'Model_Category',
            'key_to' => 'id',
            'cascade_save' => true,
            'cascade_delete' => false,
        ),
        
        'master_category' => array(
            'key_from' => 'id',
            'key_through_from' => 'content_id',
            'table_through' => 'content_in_category',
            'key_through_to' => 'category_id',
            'model_to' => 'Model_Category',
            'key_to' => 'id',
            'cascade_save' => true,
            'cascade_delete' => false,
            'conditions' => array(
                'limit' => array(1),
                'order_by' => array('created_at' => 'asc'),
            )
        ),
        
        'promoted_category' => array(
            'key_from' => 'id',
            'key_through_from' => 'content_id',
            'table_through' => 'promo_category_in_content',
            'key_through_to' => 'category_id',
            'model_to' => 'Model_Category',
            'key_to' => 'id',
            'cascade_save' => true,
            'cascade_delete' => false,
        ),
        
    );
    
    protected static $_belongs_to = array(
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
    
    protected static $_has_many = array(
        'comments' => array(
            'key_from' => 'id',
            'model_to' => 'Model_Comment',
            'key_to' => 'content_id',
            'cascade_save' => true,
            'cascade_delete' => false,
        ),
        
        'approved_comments' => array(
            'key_from' => 'id',
            'model_to' => 'Model_Comment',
            'key_to' => 'content_id',
            'cascade_save' => true,
            'cascade_delete' => false,
            'conditions' => array(
                'where' => array(
                    array('validated', '>', 0)
                ),
                'order_by' => array('created_at' => 'asc'),
            )
        ),
    );
    
    protected static $_conditions = array(
        'order_by' => array('created_at' => 'desc'),
    );
    
    private static $validator;
    
    public static function get_validator () {
        if(!isset(self::$validator)) {
            $val = \Fuel\Core\Validation::forge('content');
            $val->add_field('page_title', 'Page Title', 'max_length[150]');
            $val->add_field('title', 'Title', 'max_length[150]');
            $val->add_field('description', 'description', 'max_length[2000]');
            $val->add_field('meta', 'meta', 'max_length[2000]');
            $val->add_field('content', 'content', 'max_length[10000]');
            $val->add_field('language_id', 'language', 'max_length[11]');
            self::$validator = $val;
        }
        
        return self::$validator;
    }
    
    public static function to_array_for_dropdown ($key, $value) {
        return Arr::assoc_to_keyval(\Fuel\Core\DB::select($key, $value)->from(self::table())->execute()->as_array(), $key, $value);
    }
    
    public function get_images() {
        return Model_Image::query()->where('owner_id', '=', $this->id)->where('owner_type', '=', get_class($this))->get();
    }
    
    public function get_logo($name) {
        return (!is_null($this->logo)) ? "/files/{$this->logo->get($name)}" : '/assets/img/default.png';
    }
    
}

