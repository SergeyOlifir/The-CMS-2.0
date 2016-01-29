<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class TCLocal {
    
    protected static $instance; 
    protected static $current_lang = null;


    public $language = array();

    public function __construct() {
        if (($list = strtolower($_SERVER['HTTP_ACCEPT_LANGUAGE']))) {
            if (preg_match_all('/([a-z]{1,8}(?:-[a-z]{1,8})?)(?:;q=([0-9.]+))?/', $list, $list)) {
                $this->language = array_combine($list[1], $list[2]);
                foreach ($this->language as $n => $v)
                    $this->language[$n] = $v ? $v : 1;
                arsort($this->language, SORT_NUMERIC);
            }
        } else {
            $this->language = array();
        }
    }
    
    public function match($default, $langs) {
        $languages = array();
        foreach ($langs as $lang => $alias) {
            if (is_array($alias)) {
                foreach ($alias as $alias_lang) {
                    $languages[strtolower($alias_lang)] = strtolower($lang);
                }
            } else {
                $languages[strtolower($alias)]=strtolower($lang);
            }
        }

        foreach ($this->language as $l => $v) {
            $s = strtok($l, '-');
            if (isset($languages[$s])) {
                return $languages[$s];
            }
        }
        
        return $default;
    }
    
    public static function forge () {
        if(isset(self::$instance)) {
            return self::$instance;
        } else {
            return new static();
        }
    }
    
    public static function setCurrentLang($lang = 'ru') {
        self::$current_lang = Model_Language::query()->where('code', '=', $lang)->get_one();
    }
    
    public static function getCurrentLang() {
        return self::$current_lang;
    }
}

