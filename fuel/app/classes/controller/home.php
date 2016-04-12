<?php

/**
 * Description of home
 *
 * @author juise_man
 */
class Controller_Home extends Controller_Application {

    protected static function get_main_page() {
        $langID = TCLocal::getCurrentLangID();
        if (is_null($langID)) {
            return Model_MainPage::query()->get_one();
        } else {
            return Model_MainPage::query()->where('language_id', '=', TCLocal::getCurrentLangID())->get_one();
        }
    }
            
    function before() {
        $this->template = TCCore\TCTheme::main_view();
        
        
        
        
        if (Model_Language::query()->count() > 0) {

            if (($lang = Fuel\Core\Request::active()->param('lang')) && (Model_Language::query()->where('code', '=', $lang)->count() > 0)) {
                TCLocal::setCurrentLang($lang);
            } else {
                $matched_langs = array();//Model_Language::find('all');
                $all_langs = array();

                foreach (Model_Language::find('all') as $model_lang) {
                    $matched_langs[$model_lang->code] = explode(',', $model_lang->match);
                    $all_langs[] = $model_lang->code;
                }


                $lang = TCLocal::forge()->match('ru', $matched_langs);

                if (in_array($lang, array_keys($all_langs))) {
                    TCLocal::setCurrentLang($lang);
                } else {
                    TCLocal::setCurrentLang('ru');
                }

                //if (Fuel\Core\Request::active()->route->name == '_root_') {
                //    Fuel\Core\Response::redirect(TCRouter::get('root', Fuel\Core\Request::active()->route->named_params));
                //} else {
                //    Fuel\Core\Response::redirect(TCRouter::get(Fuel\Core\Request::active()->route->name, Fuel\Core\Request::active()->route->named_params));
                //}
                
                Fuel\Core\Response::redirect(TCRouter::get('root'));

            }

        }
        
        parent::before();
        $this->template->set_global('route_params', array('name' => Fuel\Core\Request::active()->route->name, 'named_params' => Fuel\Core\Request::active()->route->named_params));

        
        $model_mainpage = self::get_main_page();
        
        if(!is_null($model_mainpage)) {
            $this->template->set_global('main_page_model', $model_mainpage, false);
            $links = (Model_Language::query()->count() > 1) ? Model_Link::query()->where('language_id', '=', TCLocal::getCurrentLangID())->order_by('weight')->get() : Model_Link::query()->order_by('weight')->get();
            $this->template->set_global('links', $links);
        } else {
            throw new Fuel\Core\HttpNotFoundException();
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
