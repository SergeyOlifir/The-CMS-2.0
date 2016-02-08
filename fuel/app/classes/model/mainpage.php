<?php

class Model_MainPage extends Model_Base {
    protected static $_properties = array(
        'id',
        'title',
        'meta',
        'created_at',
        'updated_at',
    );
    
    protected static $_many_many = array(
        'promoted_category' => array(
            'key_from' => 'id',
            'key_through_from' => 'main_id',
            'table_through' => 'promo_category_in_mainpage',
            'key_through_to' => 'category_id',
            'model_to' => 'Model_Category',
            'key_to' => 'id',
            'cascade_save' => true,
            'cascade_delete' => false,
        ),
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
    
    public function get_featured_categories($type = null, $limit = null) {
        
        //var_dump(Model_Category::getTablesRow()); die();
         
        $result = Fuel\Core\DB::select_array(Model_Category::getTablesRow())
            ->from(Model_Category::table())
            ->join('featured_category_in_mainpage')
            ->on(Model_Category::table() . '.id', '=', 'featured_category_in_mainpage.category_id') //->from('featured_category_in_mainpage')->where('featured_category_in_mainpage.main_id', '=', $this->id)
            ->where('featured_category_in_mainpage.type', '=', $type);
        
        if(!is_null($limit)) {
            $result->limit($limit);
        }
                
        $res = $result->as_object('Model_Category')
            ->execute()->as_array('id');
        
        return $res;
    }
}

