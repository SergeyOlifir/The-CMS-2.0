<?php

class Controller_Admin_Language extends Controller_Admin {
    
    public function action_index () {
        $this->template->header = 'Языки';
        $this->template->description = 'Список';
        $this->template->models = Model_Language::find('all');
        $this->template->content = \Fuel\Core\View::forge('admin/language/index', array('models' => Model_Language::find('all')));
        
    }
    
    public function action_create () {
        
        $this->template->header = 'Языки';
        $this->template->description = 'Добавление нового языка';
        $this->template->content = \Fuel\Core\View::forge('admin/language/create');
        
        if(Fuel\Core\Input::post()) {
            if(Model_Language::get_validator()->run()) {
                $fields = Model_Language::get_validator()->validated();
                $config = \Config::get('application.galery.upload');
                Upload::process($config);
                if (Upload::is_valid()) {
                    Upload::save();
                    $logo = Model_Image::forge();
                    try {
                        $logo->save();
                    } catch (Exception $ex) {
                        $this->template->set_global('model', Model_Language::forge($fields));
                        $this->template->set_global('errors', e(array('image' => $ex)));
                        \Fuel\Core\Session::set_flash('error', 'Ошибки валидации');
                        return;
                    }

                    $fields['image'] = $logo->id;

                } else {
                    if(\Fuel\Core\Upload::get_errors('image')['file'] !== '') {
                        $this->template->set_global('model', Model_Language::forge($fields));
                        $this->template->set_global('errors', e(array('image' => $ex)));
                        \Fuel\Core\Session::set_flash('error', 'Ошибки валидации');
                        return;
                    }
                }
                $model = Model_Language::forge($fields);
                try {
                    $model->save();
                } catch (Exception $ex) {
                    \Fuel\Core\Session::set_flash('error', 'Ошибка создания языка! Язык не создан!!');
                }
                
                \Fuel\Core\Session::set_flash('success', 'Язык "'.$model->name.'" успешно создан');
                Fuel\Core\Response::redirect('/admin/language/view/' . $model->id);
                
            } else {
                $this->template->set_global('model', Model_Language::forge(Fuel\Core\Input::post()));
                $this->template->set_global('errors', e(Model_Language::get_validator()->error()));
                \Fuel\Core\Session::set_flash('error', 'Ошибки валидации');
            }
        }
    }
    
    public function action_edit ($id = null) {
        if($id and $model = Model_Language::find($id)) {
            $this->template->header = 'Языки';
            $this->template->description = 'Редактирование';
            $this->template->content = \Fuel\Core\View::forge('admin/langue/edit');
            if(Fuel\Core\Input::post()) {
                if(Model_Language::get_validator()->run()) {
                    $fields = Model_Language::get_validator()->validated();
                    $config = \Config::get('application.galery.upload');
                    Upload::process($config);
                    if ((count(\Fuel\Core\Upload::get_files()) > 0) and Upload::is_valid()) {
                        Upload::save();
                        $logo = Model_Image::forge();
                        try {
                            $logo->save();
                        } catch (Exception $ex) {
                            $this->template->set_global('model', $model->from_array($fields));
                            $this->template->set_global('errors', e(array('image' => $ex)));
                            \Fuel\Core\Session::set_flash('error', 'Ошибки валидации');
                            return;
                        }

                        $fields['image'] = $logo->id;

                    } else {
                        if(\Fuel\Core\Upload::get_errors('image')['file'] !== '') {
                            $this->template->set_global('model', $model->from_array($fields));
                            $this->template->set_global('errors', e(array('image' => 'error')));
                            \Fuel\Core\Session::set_flash('error', 'Ошибки валидации');
                            return;
                        }

                    }
                    $model->from_array($fields);
                    try {
                        $model->save();
                    } catch (Exception $ex) {
                        \Fuel\Core\Session::set_flash('error', 'Ошибка обновления языка! Язык не обновлен!!');
                    }
                    
                    \Fuel\Core\Session::set_flash('success', 'Язык успешно обновлен!');
                    Fuel\Core\Response::redirect('/admin/language/view/' . $model->id);
                    
                } else {
                    $model->from_array(Fuel\Core\Input::post());
                    $this->template->set_global('errors', e(Model_Language::get_validator()->error()));
                    \Fuel\Core\Session::set_flash('error', 'Ошибки валидации');
                }
            }
            
            $this->template->set_global('model', $model);
            
            
        } else {
            Fuel\Core\Response::redirect(\Fuel\Core\Router::get('404'));
        }
    }
    
    public function action_delete ($id = null) {
        if(isset($id) and $model = Model_Language::find($id)) {
            try {
                $model->delete();
                \Fuel\Core\Session::set_flash('success', 'Язык успешно удален!');
                Fuel\Core\Response::redirect('/admin/language/index');
            } catch (Exception $ex) {
                \Fuel\Core\Session::set_flash('error', 'Ошибка удаления языка! Язык не был удален!!');
            }
        } else {
            Fuel\Core\Response::redirect(\Fuel\Core\Router::get('404'));
        }
    }
    
    public function action_view ($id) {
        if(isset($id) and $model = Model_Language::find($id)) {
            $this->template->set_global('model', $model, false);
            $this->template->set_global('models', Model_Language::find('all'), false);
            $this->template->header = 'Языки';
            $this->template->description = 'Просмотр';
            $this->template->content = \Fuel\Core\View::forge('admin/language/view');
        } else {
            Fuel\Core\Response::redirect(\Fuel\Core\Router::get('404'));
        }
    }
}

