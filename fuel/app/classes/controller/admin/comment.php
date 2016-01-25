<?php

class Controller_Admin_Comment extends Controller_Admin {
    
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

