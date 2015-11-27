<?php

class Model_MainPage extends Model_Base {
    protected static $_properties = array(
        'id',
        'title',
        'meta',
        'created_at',
        'updated_at',
    );
    
    private static $validator;
    
    public static function get_validator () {
        if(!isset(self::$validator)) {
            $val = \Fuel\Core\Validation::forge('content');
            $val->add_field('title', 'Title', 'max_length[150]');
            $val->add_field('meta', 'meta', 'max_length[2000]');
            self::$validator = $val;
        }
        
        return self::$validator;
    }
    
    public function get_images() {
        return Model_Image::query()->where('owner_id', '=', $this->id)->where('owner_type', '=', get_class($this))->get();
    }
}

