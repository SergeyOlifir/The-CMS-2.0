<?php

class Controller_Errors extends \Fuel\Core\Controller {
    
    function action_404() {
        Fuel\Core\Response::redirect('/');
    }
}