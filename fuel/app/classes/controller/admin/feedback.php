<?php

class Controller_Admin_Feedback extends Controller_Admin {
    
    public function action_index () {
        $this->template->header = 'Отзывы';
        $this->template->description = 'Список';
        $this->template->content = \Fuel\Core\View::forge('admin/feedback/index', array('models' => Model_Feedback::find('all')));
        
    }
    
    public function action_view ($id = null) {
        if($model = Model_Feedback::find($id)) {
            $this->template->header = 'Отзывы';
            $this->template->description = 'Просмотр';
            $model->validated = 2;
            try {
                $model->save();
            } catch (Exception $ex) {

            }
            $this->template->content = \Fuel\Core\View::forge('admin/feedback/view', array('model' => $model), false);
        } else {
            \Fuel\Core\Session::set_flash('error', 'Ошибка! Такого отзыва нет');
            \Fuel\Core\Response::redirect_back();
        }
        
    }

    public function action_remove($id = null, $to_list = false) {
        if($model = Model_Feedback::find($id)) {
            try {
                $model->delete();
            } catch (Exception $ex) {
                \Fuel\Core\Session::set_flash('error', 'Ошибка! Отзыв не удален');
                \Fuel\Core\Response::redirect_back();
            }
            
            \Fuel\Core\Session::set_flash('success', 'Отзыв успешно удален');
        }
        
        if($to_list) {
            \Fuel\Core\Response::redirect('/admin/feedback/index');
        } else {
            \Fuel\Core\Response::redirect_back();
        }
    }
}