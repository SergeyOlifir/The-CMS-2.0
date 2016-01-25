<?php

class Model_Comment extends Model_Base {
    protected static $_properties = array(
        'id',
        'content_id',
        'text',
        'user_name',
        'user_email',
        'validated' => array(
            'default' => 0
        ),
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
        'content' => array(
            'key_from' => 'content_id',
            'model_to' => 'Model_Content',
            'key_to' => 'id',
            'cascade_save' => true,
            'cascade_delete' => false,
        )
    );
    
    private static $validator;
    
    public static function get_validator () {
        if(!isset(self::$validator)) {
            $val = \Fuel\Core\Validation::forge('category');
            $val->add_field('user_name', 'User Name', 'max_length[150]');
            $val->add_field('user_email', 'Email', 'max_length[150]');
            $val->add_field('text', 'Text', 'max_length[2000]');
            self::$validator = $val;
        }
        
        return self::$validator;
    }
    
    public function get_status () {
        switch ($this->validated) {
            case 0:
                return 'Не проверен';
            case 1:
                return 'Отклонен';
            case 2:
                return 'Проверен';
            default :
                return 'Не проверен';
        }
    }
    
}

