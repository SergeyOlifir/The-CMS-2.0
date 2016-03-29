<?php

class Controller_Admin_Comment extends Controller_Admin {
    
    public function action_index($mode = 'all') {
        $this->template->content = \Fuel\Core\View::forge('admin/comment/index');
        $this->template->header = 'Комментарии';
        
        switch ($mode) {
            case 'new':
                $this->template->description = 'За сегодня';
                $this->template->content->set('models', Model_Comment::query()->where('created_at', '>', (new \DateTime('today'))->getTimestamp())->get());
                break;
            case 'unread':
                $this->template->description = 'Не прочитанные';
                $this->template->content->set('models', Model_Comment::query()->where('validated', '=', 1)->get());
                break;
            default :
                $this->template->description = 'Все';
                $this->template->content->set('models', Model_Comment::find('all'));
                break;
        }
        
    }

    public function action_approve($id = null) {
        if($model = Model_Comment::find($id)) {
            $model->validated = 2;
            try {
                $model->save();
            } catch (Exception $ex) {
                \Fuel\Core\Session::set_flash('error', 'Ошибка! Комментарий не одобрен');
                \Fuel\Core\Response::redirect_back();
            }
            
            \Fuel\Core\Session::set_flash('success', 'Комментарий одобрен');
        }
        
        \Fuel\Core\Response::redirect_back();
    }
    
    public function action_reject($id = null) {
        if($model = Model_Comment::find($id)) {
            $model->validated = 1;
            try {
                $model->save();
            } catch (Exception $ex) {
                \Fuel\Core\Session::set_flash('error', 'Ошибка! Комментарий не отклонен');
                \Fuel\Core\Response::redirect_back();
            }
            
            \Fuel\Core\Session::set_flash('success', 'Комментарий отклонен');
        }
        
        \Fuel\Core\Response::redirect_back();
    }
    
    public function action_remove($id = null) {
        if($model = Model_Comment::find($id)) {
            try {
                $model->delete();
            } catch (Exception $ex) {
                \Fuel\Core\Session::set_flash('error', 'Ошибка! Комментарий не удален');
                \Fuel\Core\Response::redirect_back();
            }
            
            \Fuel\Core\Session::set_flash('success', 'Комментарий успешно удален');
        }
        
        \Fuel\Core\Response::redirect_back();
    }
}

