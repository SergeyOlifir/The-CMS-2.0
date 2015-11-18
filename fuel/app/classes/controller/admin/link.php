<?php

class Controller_Admin_Link extends Controller_Admin {
    
    public function action_index() {
        $this->template->header = 'Ссылки';
        $this->template->description = 'Список';
        $this->template->content = \Fuel\Core\View::forge('admin/link/index', array('models' => Model_Link::find('all')));
    }
    
    public function action_create() {
        if(Fuel\Core\Input::post()) {
            if(Model_Link::get_validator()->run()) {
                $model = Model_Link::forge(Model_Link::get_validator()->validated());
                try {
                    $model->save();
                } catch (Exception $ex) {
                    \Fuel\Core\Session::set_flash('error', 'Ошибка создания ссылки! Ссылка не создана!!');
                }
                
                \Fuel\Core\Session::set_flash('success', 'Ссылка успешно создана');
                Fuel\Core\Response::redirect('/admin/link/index');
            } else {
                $this->template->set_global('model', Model_Link::forge(Fuel\Core\Input::post()));
                $this->template->set_global('errors', e(Model_Link::get_validator()->error()));
                \Fuel\Core\Session::set_flash('error', 'Ошибки валидации');
            }
        }
        
        $this->template->header = 'Ссылки';
        $this->template->description = 'Добавьте новую';
        $this->template->content = \Fuel\Core\View::forge('admin/link/create');
        $this->template->content->set_global('categories_id', Model_Category::to_array_for_dropdown('id', 'title'));
    }
    
    public function action_edit ($id = null) {
        if($id and $model = Model_Link::find($id)) {
            
            if(Fuel\Core\Input::post()) {
                if(Model_Link::get_validator()->run()) {
                    $model->from_array(Model_Link::get_validator()->validated());
                    try {
                        $model->save();
                    } catch (Exception $ex) {
                        \Fuel\Core\Session::set_flash('error', 'Ошибка обновления ссылки! Ссылка не обновлена!!');
                    }
                    
                    \Fuel\Core\Session::set_flash('success', 'Ссылка успешно обновлена!');
                    Fuel\Core\Response::redirect('/admin/link/index');
                    
                } else {
                    $model->from_array(Fuel\Core\Input::post());
                    $this->template->set_global('errors', e(Model_Link::get_validator()->error()));
                    \Fuel\Core\Session::set_flash('error', 'Ошибки валидации');
                }
            }
            
            $this->template->set_global('model', $model);
            $this->template->header = 'Ссылки';
            $this->template->description = 'Редактирование';
            $this->template->content = \Fuel\Core\View::forge('admin/link/edit');
            $this->template->content->set_global('categories_id', Model_Category::to_array_for_dropdown('id', 'title'));
            
        } else {
            Fuel\Core\Response::redirect(\Fuel\Core\Router::get('404'));
        }
    }
    
    public function action_delete ($id = null) {
        if(isset($id) and $model = Model_Link::find($id)) {
            try {
                $model->delete();
                \Fuel\Core\Session::set_flash('success', 'Ссылка успешно удаленa!');
            } catch (Exception $ex) {
                \Fuel\Core\Session::set_flash('error', 'Ошибка удаления ссылки! Cсылка не удалена!!');
            }
            Fuel\Core\Response::redirect('/admin/link/index');
        } else {
            Fuel\Core\Response::redirect(\Fuel\Core\Router::get('404'));
        }
    }
    
    public function action_view ($id) {
        if(isset($id) and $model = Model_Link::find($id)) {
            $this->template->set_global('model', $model);
            $this->template->header = 'Ссылки';
            $this->template->description = 'Просмотр';
            $this->template->content = \Fuel\Core\View::forge('admin/link/view');
        } else {
            Fuel\Core\Response::redirect(\Fuel\Core\Router::get('404'));
        }
    }
}

