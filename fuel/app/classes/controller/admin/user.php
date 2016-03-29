<?php

class Controller_Admin_User extends Controller_Admin {
    
    public function action_index() {
        $this->template->header = 'Пользователи';
        $this->template->description = 'Список';
        $this->template->models = \Auth\Model\Auth_User::find('all');
        $this->template->content = \Fuel\Core\View::forge('admin/user/index', array('models' => \Auth\Model\Auth_User::find('all')));
    }
    
    


    public function action_unsetadmin($id = null) {
        if($id and $model = \Auth\Model\Auth_User::find($id)) {
            $model->group_id = 1;
            try {
                $model->save();
                \Fuel\Core\Session::set_flash('success', 'Пользователь обновлен!');
            } catch (Exception $ex) {
                \Fuel\Core\Session::set_flash('error', 'Ошибка обновления пользователя!');
            }
        }
        
        Fuel\Core\Response::redirect_back();
    }
    
    
    
    public function action_setadmin($id = null) {
        if($id and $model = \Auth\Model\Auth_User::find($id)) {
            $model->group_id = 6;
            try {
                $model->save();
                \Fuel\Core\Session::set_flash('success', 'Пользователь обновлен!');
            } catch (Exception $ex) {
                 \Fuel\Core\Session::set_flash('error', 'Ошибка обновления пользователя!');
            }
        }
        
        Fuel\Core\Response::redirect_back();
    }
}

