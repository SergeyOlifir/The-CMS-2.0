<?php

class Controller_Admin_Auth extends Controller_Admin {
    
    public $template = 'admin/auth_template';


    public function action_login() {
        if(\Fuel\Core\Input::post()) {
            if (\Auth::login(\Fuel\Core\Input::post('username'), \Fuel\Core\Input::post('password'))) {
                Fuel\Core\Session::set_flash('success', 'Угадал');
                Fuel\Core\Response::redirect('/admin/dashboard');
            } else {
                Fuel\Core\Session::set_flash('error', 'Не угадал');
            }
        }
        
        $this->template->content = Fuel\Core\View::forge('admin/auth/login');
        
    }
    
    public function action_logout() {
        \Auth::dont_remember_me();
        \Auth\Auth::logout();
        Fuel\Core\Response::redirect('/admin');
    }
    
    public function action_create() {
        if(\Fuel\Core\Input::post()) {
            $created = \Auth::create_user(
                Fuel\Core\Input::post('username'),
                Fuel\Core\Input::post('password'),
                Fuel\Core\Input::post('email'),
                \Config::get('application.user.default_group', 1)
            );
            
            if ($created) {
                Fuel\Core\Response::redirect('/admin/dashboard');
            }
        }
        
        $this->template->content = Fuel\Core\View::forge('admin/auth/create');
    }
}

