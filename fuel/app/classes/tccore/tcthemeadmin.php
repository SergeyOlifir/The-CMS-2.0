<?php

class TCThemeAdmin extends TCTheme {
    
    protected static function config_check() {
        self::$temlate_main = \Fuel\Core\Config::get("TCTheme.admin_main_faile_name");
        self::$tempalte_dir = \Fuel\Core\Config::get("TCTheme.admin_theme_folder");
    }
}
