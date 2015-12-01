<?php

class TCForm {
    
    protected static $tempalte_path = 'tcform/tempates/base/';


    public static function Input (array $config) {
        return \Fuel\Core\View::forge(self::$tempalte_path . 'input', $config, true);
    }
    
    public static function Select (array $config) {
        return \Fuel\Core\View::forge(self::$tempalte_path . 'select', $config, true);
    }
    
    public static function Textarea (array $config) {
        return \Fuel\Core\View::forge(self::$tempalte_path . 'textarea', $config, true);
    }
    
    public static function File (array $config) {
        return \Fuel\Core\View::forge(self::$tempalte_path . 'file', $config, true);
    }
}
