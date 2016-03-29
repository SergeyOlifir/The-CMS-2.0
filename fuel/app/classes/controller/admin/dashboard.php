<?php

class Controller_Admin_Dashboard extends Controller_Admin {
    
    public function action_index() {
        $this->template->header = 'Dashboard';
        $this->template->content = \Fuel\Core\View::forge('admin/dachboard/view');
        $this->template->set_global('unwotched_comments_count', Model_Comment::query()->where('validated', '=', 1)->count());
        $this->template->set_global('new_comments_count', Model_Comment::query()->where('created_at', '>', (new \DateTime('today'))->getTimestamp())->count());
    }
}

