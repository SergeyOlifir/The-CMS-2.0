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
        $numbers = Fuel\Core\Session::get('capcha');
        if($numbers && (($numbers['first'] +  $numbers['second']) == \Fuel\Core\Input::post('capcha_result'))) {
            return $this->response(array('status' => 'ok'));
        } else {
            return $this->response(array('status' => 'fail', 'errors' => array('capcha' => true)));
        }
    }
}

