<?php
/**
 * Custom Theme helper class
 *
 * @author juise_man
 * 
 */

namespace TCCore {
    
    class TCTheme {
	
	public static $tempalte_dir;
	public static $temlate_main;

        protected static function config_check() {
            self::$temlate_main = \Fuel\Core\Config::get("TCTheme.main_faile_name");
            self::$tempalte_dir = \Fuel\Core\Config::get("TCTheme.theme_folder");
        }

        public static function main_view() {
            self::config_check();
            return "templates" . DS . self::$tempalte_dir . DS . self::$temlate_main;
	}
        
        public static function load_view($view, $data = null) {
            self::config_check();
            if(isset($data)) {
                return \Fuel\Core\View::forge("templates" . DS . self::$tempalte_dir . DS . $view, $data, false);
            } else {
                return \Fuel\Core\View::forge("templates" . DS . self::$tempalte_dir . DS . $view, false);
            }
			
	}
	
	public static function render($view, $data = null, $filter_html = false) {
            self::config_check();
            if(isset($data)) {
                return render("templates" . DS . self::$tempalte_dir . DS . $view, $data, $filter_html);
            } else {
                return render("templates" . DS . self::$tempalte_dir . DS . $view, $filter_html);
            }
	}
	
	public static function add_css($stylesheets, $attrs = array()) {
            self::config_check();
            return \Fuel\Core\Asset::css("templates" . DS . self::$tempalte_dir . DS . $stylesheets, $attrs);
	}
	
	public static function add_js($javascripts, $attrs = array()) {
            self::config_check();
            return \Fuel\Core\Asset::js("templates" . DS . self::$tempalte_dir . DS . $javascripts, $attrs);
	}

    }
}

