<?php

class Controller_Home_Comment extends Fuel\Core\Controller_Rest {
    
    public function get_capcha() {
        $numbers = array(
            'first' => rand(1, 20), 
            'second' => rand(5, 30)
        );
        Fuel\Core\Session::set('capcha', $numbers);
        return $this->response($numbers);
    }
    
    public function post_create() {
        $status = 'ok';
        $errors = array();
        $numbers = Fuel\Core\Session::get('capcha');
        if($numbers && (($numbers['first'] +  $numbers['second']) == \Fuel\Core\Input::post('capcha_result'))) {
            ///return $this->response(array('status' => 'ok'));
            
            if(Model_Comment::get_validator()->run()) {
                if($content = Model_Content::find(\Fuel\Core\Input::post('id'))) {
                    $fields = Model_Comment::get_validator()->validated();
                    $content->comments[] = Model_Comment::forge(array(
                        'user_name' => strip_tags($fields['user_name']),
                        'user_email' => strip_tags($fields['user_email']),
                        'text' => strip_tags($fields['text']),
                    ));
                    $content->save();
                    return $this->response(array('status' => 'ok'));
                }
            }
            
        } else {
            return $this->response(array('status' => 'fail', 'errors' => array('capcha' => true)));
        }
    }
    
    public function get_all ($id = null) {
        if(isset($id) and $model = Model_Content::find($id)) {
            return $this->response(array_values($model->approved_comments));
        }
        
        return $this->response(array('comments' => array()));
    }
}

