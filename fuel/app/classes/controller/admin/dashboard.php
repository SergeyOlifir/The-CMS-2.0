<?php

class Controller_Admin_Dashboard extends Controller_Admin {
    
    public function action_index() {
        $this->template->header = 'Dashboard';
    }
}

