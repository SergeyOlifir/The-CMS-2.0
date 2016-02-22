<?php

class Controller_Admin extends Controller_Application {
    
    public $template = 'admin/template';
    public static $extraCSS = array();
    
    public function before() {
        
        if ( Fuel\Core\Request::active()->action !== 'login' and ! \Auth::check()) {
            Response::redirect('/admin/auth/login');
        }
        self::$extraCSS = array('bootstrap' => '/assets/css/bootstrap.min.css', 'tpl' => '/assets/css/templates/' . \Fuel\Core\Config::get('TCTheme')['theme_folder'] . '/carusel.css');
        return parent::before();
    }
    
    public function action_index() {
        \Fuel\Core\Response::redirect('/admin/dashboard');
    }
}

