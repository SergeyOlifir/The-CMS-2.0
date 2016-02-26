<?php

/**
 * Description of home
 *
 * @author juise_man
 */
class Controller_Home extends Controller_Application {

    protected static function get_main_page() {
        return Model_MainPage::query()->get_one();
    }
            
    function before() {
        $this->template = TCCore\TCTheme::main_view();
        
        parent::before();
        
        $lang = Fuel\Core\Request::active()->param('lang');
        TCLocal::setCurrentLang($lang);
        $this->template->set_global('route_params', array('name' => Fuel\Core\Request::active()->route->name, 'named_params' => Fuel\Core\Request::active()->route->named_params));
        
        $model_mainpage = self::get_main_page();
        
        if(!is_null($model_mainpage)) {
            $this->template->set_global('main_page_model', $model_mainpage, false);
        }

        self::$current_page = \Fuel\Core\Request::active()->uri->current();
    }

    function action_index() {
        self::$current_page = "Home";
        $main = self::get_main_page();
        if(!is_null($main)) {
            $this->template->set_global('title', $main->title);
            $this->template->set_global('meta_keywrd', $main->meta);
        }
        $this->template->content = TCCore\TCTheme::load_view('home/partials/home');
    }

}
