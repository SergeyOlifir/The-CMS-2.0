<?php

class Model_Language extends Model_Base {
    protected static $_properties = array(
        'id',
        'name',
        'code',
        'image',
        'match',
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
        'logo' => array(
            'key_from' => 'image',
            'model_to' => 'Model_Image',
            'key_to' => 'id',
            'cascade_save' => true,
            'cascade_delete' => false,
        )
    );
    
    protected static $_has_many = array(
        'translations' => array(
            'key_from' => 'id',
            'model_to' => 'Model_Translation',
            'key_to' => 'language_id',
            'cascade_save' => true,
            'cascade_delete' => false,
        )
    );
    
    private static $validator;
    
    public static function get_validator () {
        if(!isset(self::$validator)) {
            $val = \Fuel\Core\Validation::forge('language');
            $val->add_field('name', 'Name', 'required|max_length[150]');
            $val->add_field('code', 'Code', 'max_length[10]');
            $val->add_field('match', 'Match', 'max_length[100]');
            self::$validator = $val;
        }
        
        return self::$validator;
    }

    public static function to_array_for_dropdown ($key, $value) {
        return Arr::assoc_to_keyval(\Fuel\Core\DB::select($key, $value)->from(self::table())->execute()->as_array(), $key, $value);
    }
    
    public function get_logo($name) {
        return (!is_null($this->logo)) ? "/files/{$this->logo->get($name)}" : '/assets/img/default_lang.png';
    }
}

