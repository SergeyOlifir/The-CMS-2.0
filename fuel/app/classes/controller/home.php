<?php

/**
 * Description of home
 *
 * @author juise_man
 */
class Controller_Home extends Controller_Application {

    function before() {
        $this->template = TCCore\TCTheme::main_view();
        parent::before();
    }

    function action_index() {
        self::$current_page = "Home";
        $this->template->content = TCCore\TCTheme::load_view('home/partials/home');
    }

}
