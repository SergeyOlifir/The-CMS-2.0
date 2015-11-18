<?php

class Controller_Admin extends Controller_Application {
    
    public $template = 'admin/template';
    
    public function before() {
        
        if ( Fuel\Core\Request::active()->action !== 'login' and ! \Auth::check()) {
            Response::redirect('/admin/auth/login');
        }
        
        return parent::before();
    }

}

