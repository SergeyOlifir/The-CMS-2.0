<?php

class Controller_Application extends Fuel\Core\Controller_Template {
    protected function register_css($stylesheets, $attrs = array()) {
        Asset::css($stylesheets, $attrs, 'stylesheets');
    }

    protected function register_js($javascripts, $attrs = array()) {
        Asset::js($javascripts, $attrs, 'javascripts');
    }

    protected function SetNotice($notiseType, $notiseText) {
        Session::set_flash('notice_type', $notiseType);
        Session::set_flash('notice', $notiseText);
    }
    
    public static $current_page = "";
    
    function before() {
        parent::before();
        
        $lang = Fuel\Core\Request::active()->param('lang');
        TCLocal::setCurrentLang($lang);
        //echo $lang;
    }
}