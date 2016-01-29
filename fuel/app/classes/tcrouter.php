<?php

class TCRouter extends Fuel\Core\Router {
    
    public static function get($name, $named_params = array()) {
        if($lang = TCLocal::getCurrentLang()) {
            $named_params['lang'] = $lang->code;
        }
        return parent::get($name, $named_params);
    }
}

