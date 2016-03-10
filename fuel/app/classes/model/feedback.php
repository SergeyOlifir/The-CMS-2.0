<?php

class Model_Feedback extends Model_Base {
    protected static $_properties = array(
        'id',
        'text',
        'user_name',
        'user_email',
        'validated' => array(
            'default' => 1
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
    
    private static $validator;
    
    public static function get_validator () {
        if(!isset(self::$validator)) {
            $val = \Fuel\Core\Validation::forge('category');
            $val->add_field('user_name', 'User Name', 'required|max_length[150]');
            $val->add_field('user_email', 'Email', 'required|max_length[150]');
            $val->add_field('text', 'Text', 'required|max_length[2000]');
            self::$validator = $val;
        }
        
        return self::$validator;
    }
    
    public function get_status () {
        switch ($this->validated) {
            case 1:
                return 'Не просмотрен';
            case 0:
                return 'Просмотрен';
            case 2:
                return 'Просмотрен';
            default :
                return 'Не просмотрен';
        }
    }
    
}

