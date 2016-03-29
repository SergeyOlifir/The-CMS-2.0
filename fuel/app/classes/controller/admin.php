<?php

class Controller_Admin extends Controller_Application {
    
    public $template = 'admin/template';
    public static $extraCSS = array();
    
    public function before() {
        
        if ( Fuel\Core\Request::active()->action !== 'login' and Fuel\Core\Request::active()->action !== 'create' and ! \Auth::check()) {
            Response::redirect('/admin/auth/login');
        }
        self::$extraCSS = array('bootstrap' => '/assets/css/bootstrap.min.css', 'tpl' => '/assets/css/templates/' . \Fuel\Core\Config::get('TCTheme')['theme_folder'] . '/carusel.css');
        parent::before();
        
        $this->template->set_global('tcadmin_config', \Fuel\Core\Config::get('TCAdmin'));
        
        if(\Fuel\Core\Config::get('TCAdmin.has_feedbacks')) {
            $this->template->set_global('unread_feedback_count', Model_Feedback::query()->where('validated', '=', '1')->count());
            $this->template->set_global('unread_feedbacks', Model_Feedback::query()->where('validated', '=', '1')->limit(6)->get());
        }
    }
    
    public function action_index() {
        \Fuel\Core\Response::redirect('/admin/dashboard');
    }
}

