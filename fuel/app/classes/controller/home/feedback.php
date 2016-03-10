<?php

class Controller_Home_Feedback extends Fuel\Core\Controller_Rest {
    
    public function post_create() {
        $status = 'ok';
        $errors = array();
        
        if(Model_Feedback::get_validator()->run()) {
            $fedback = Model_Feedback::forge(Model_Feedback::get_validator()->validated());
            $fedback->save();
            return $this->response(array('status' => 'ok'));
        } else {
            return $this->response(array('status' => 'fail', 'errors' => Model_Feedback::get_validator()->error()));
        }
            
        
    }
    
}

