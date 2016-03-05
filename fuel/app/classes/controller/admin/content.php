<?php

class Controller_Admin_Content extends Controller_Admin {
    
    public function action_index () {
        $this->template->header = 'Контент';
        $this->template->description = 'Список';
        $this->template->content = \Fuel\Core\View::forge('admin/content/index', array('models' => Model_Content::find('all')));
        
    }
    
    
    public function action_create () {
        
        $this->template->header = 'Контент';
        $this->template->description = 'Добавьте новый';
        $this->template->content = \Fuel\Core\View::forge('admin/content/create');
        
        if(Fuel\Core\Input::post()) {
            if(Model_Content::get_validator()->run()) {
                $fields = Model_Content::get_validator()->validated();
                $config = \Config::get('application.galery.upload');
                Upload::process($config);
                if (Upload::is_valid()) {
                    Upload::save();
                    $logo = Model_Image::forge();
                    try {
                        $logo->save();
                    } catch (Exception $ex) {
                        $this->template->set_global('model', Model_Content::forge($fields));
                        $this->template->set_global('errors', e(array('image' => $ex)));
                        \Fuel\Core\Session::set_flash('error', 'Ошибки валидации');
                        return;
                    }

                    $fields['image'] = $logo->id;

                } else {
                    if(\Fuel\Core\Upload::get_errors('image')['file'] !== '') {
                        $this->template->set_global('model', Model_Content::forge($fields));
                        $this->template->set_global('errors', e(array('image' => $ex)));
                        \Fuel\Core\Session::set_flash('error', 'Ошибки валидации');
                        return;
                    }
                }
                $model = Model_Content::forge($fields);
                try {
                    $model->save();
                } catch (Exception $ex) {
                    \Fuel\Core\Session::set_flash('error', 'Ошибка создания контента! Контент не создана!!');
                }
                
                \Fuel\Core\Session::set_flash('success', 'Кoнтент успешно создан');
                Fuel\Core\Response::redirect('/admin/content/view/' . $model->id);
                
            } else {
                $this->template->set_global('model', Model_Content::forge(Fuel\Core\Input::post()));
                $this->template->set_global('errors', e(Model_Content::get_validator()->error()));
                \Fuel\Core\Session::set_flash('error', 'Ошибки валидации');
            }
        }
        
        
    }
    
    public function action_edit ($id = null) {
        if($id and $model = Model_Content::find($id)) {
            $this->template->header = 'Категории';
            $this->template->description = 'Редактирование';
            $this->template->content = \Fuel\Core\View::forge('admin/content/edit');
            if(Fuel\Core\Input::post()) {
                if(Model_Content::get_validator()->run()) {
                    $fields = Model_Content::get_validator()->validated();
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
                        \Fuel\Core\Session::set_flash('error', 'Ошибка обновления контента! Контент не обновлен!!');
                    }
                    
                    \Fuel\Core\Session::set_flash('success', 'Контент успешно обновлен!');
                    Fuel\Core\Response::redirect('/admin/content/view/' . $model->id);
                    
                } else {
                    $model->from_array(Fuel\Core\Input::post());
                    $this->template->set_global('errors', e(Model_Content::get_validator()->error()));
                    \Fuel\Core\Session::set_flash('error', 'Ошибки валидации');
                }
            }
            
            $this->template->set_global('model', $model);
            
            
        } else {
            Fuel\Core\Response::redirect(\Fuel\Core\Router::get('404'));
        }
    }
    
    public function action_delete ($id = null) {
        if(isset($id) and $model = Model_Content::find($id)) {
            try {
                $model->delete();
                \Fuel\Core\Session::set_flash('success', 'Контент успешно удален!');
                Fuel\Core\Response::redirect('/admin/content/index');
            } catch (Exception $ex) {
                \Fuel\Core\Session::set_flash('error', 'Ошибка удаления контента! КОнтент не удалена!!');
            }
        } else {
            Fuel\Core\Response::redirect(\Fuel\Core\Router::get('404'));
        }
    }
    
    public function action_view ($id) {
        if(isset($id) and $model = Model_Content::find($id)) {
            $this->template->set_global('model', $model, false);
            $this->template->set_global('models', Model_Content::query()->where('language_id', '=', $model->language_id)->get(), false);
            $this->template->set_global('models_category', Model_Category::query()->where('language_id', '=', $model->language_id)->get(), false);
            $this->template->header = 'Контент';
            $this->template->description = 'Просмотр';
            $this->template->content = \Fuel\Core\View::forge('admin/content/view', array(), false);
            $this->template->content->auto_filter(false);
        } else {
            Fuel\Core\Response::redirect(\Fuel\Core\Router::get('404'));
        }
    }
    
    public function  action_set ($id = null) {
        if(isset($id) and $model = Model_Content::find($id)) {
            if(\Fuel\Core\Input::post() && count(\Fuel\Core\Input::post('relations')) > 0) {
                foreach (\Fuel\Core\Input::post('relations') as $related_id) {
                    if($related_model = Model_Content::find((int)$related_id)) {
                        $model->related_content[] = $related_model;
                    }
                }
                try {
                    $model->save();	
                    
                } catch (Exception $ex) {
                    \Fuel\Core\Session::set_flash('error', 'Чтото не так');
                }
                \Fuel\Core\Session::set_flash('success', 'Контент успешно привязаны');
                Fuel\Core\Response::redirect_back();
                
            } else {
                \Fuel\Core\Session::set_flash('error', 'Чтото не так');
                Fuel\Core\Response::redirect_back();
            }
        } else {
            Fuel\Core\Response::redirect(\Fuel\Core\Router::get('404'));
        }
    }
    
    public function action_unset($id = null, $related_id = null) {
        if(isset($id) and isset($related_id) and $model = Model_Content::find($id) and $rmodel = Model_Content::find($related_id)) {
            try {
                unset($model->related_content[$related_id]);
                $model->save();
            } catch (Exception $ex) {
                \Fuel\Core\Session::set_flash('error', 'Чтото не так');
            }
            
            \Fuel\Core\Session::set_flash('success', 'Контент успешно отвязан');
            Fuel\Core\Response::redirect_back();
            
        } else {
            Fuel\Core\Response::redirect(\Fuel\Core\Router::get('404'));
        }
            
    }
    
    public function action_setto ($id = null) {
        if(isset($id) and $model = Model_Content::find($id)) {
            if(\Fuel\Core\Input::post() && count(\Fuel\Core\Input::post('relations')) > 0) {
                foreach (\Fuel\Core\Input::post('relations') as $related_id) {
                    if($related_model = Model_Content::find((int)$related_id)) {
                        //$related_model->related_category[] = $model;
                        $model->related_to_content[] = $related_model;
                    }
                }
                
                try {
                    $model->save();	
                } catch (Exception $ex) {
                    \Fuel\Core\Session::set_flash('error', 'Чтото не так');
                    return Fuel\Core\Response::redirect_back();
                }
                
                \Fuel\Core\Session::set_flash('success', 'Контент успешно привязан');
                Fuel\Core\Response::redirect_back();
                
            } else {
                \Fuel\Core\Session::set_flash('error', 'Чтото не так');
                Fuel\Core\Response::redirect_back();
            }
        } else {
            Fuel\Core\Response::redirect(\Fuel\Core\Router::get('404'));
        }
    }
    
    public function action_add_image($id = null) {
        if(isset($id) and $model = Model_Content::find($id)) {
            $config = \Config::get('application.galery.upload');
            Upload::process($config);
            if ((count(\Fuel\Core\Upload::get_files()) > 0) and Upload::is_valid()) {
                Upload::save();
                $logo = Model_Image::forge(array(
                    'owner_id' => $id,
                    'owner_type' => get_class($model)
                ));
                try {
                    $logo->save();
                } catch (Exception $ex) {
                    $this->template->set_global('model', $model->from_array($fields));
                    $this->template->set_global('errors', e(array('image' => $ex)));
                    \Fuel\Core\Session::set_flash('error', 'Ошибки валидации');
                    \Fuel\Core\Response::redirect_back();
                    return;
                }
                
                \Fuel\Core\Session::set_flash('success', 'Изображение привязано');

            } else {
                if(\Fuel\Core\Upload::get_errors('image')['file'] !== '') {
                    \Fuel\Core\Session::set_flash('error', 'Ошибки валидации');
                    \Fuel\Core\Response::redirect_back();
                    return;
                }

            }
        } else {
            
        }
        \Fuel\Core\Response::redirect_back();
    }
    
    public function action_remove_image($image_id = null) {
        if(isset($image_id) and $model = Model_Image::find($image_id)) {
            $model->delete();
            \Fuel\Core\Session::set_flash('success', 'Изображение удалено');
        } else {
            \Fuel\Core\Session::set_flash('error', 'Нет такой картинки');
        }
        
        \Fuel\Core\Response::redirect_back();
    }
    
    public function action_add_promo($id = null) {
        if(isset($id) and $model = Model_Content::find($id)) {
            if(\Fuel\Core\Input::post() && count(\Fuel\Core\Input::post('relations')) > 0) {
                foreach (\Fuel\Core\Input::post('relations') as $related_id) {
                    if($related_model = Model_Category::find((int)$related_id)) {
                        $model->promoted_category[] = $related_model;
                    }
                }
                try {
                    $model->save();	
                    
                } catch (Exception $ex) {
                    \Fuel\Core\Session::set_flash('error', 'Чтото не так');
                }
                \Fuel\Core\Session::set_flash('success', 'Категории успешно привязаны');
                Fuel\Core\Response::redirect_back();
                
            } else {
                \Fuel\Core\Session::set_flash('error', 'Чтото не так');
                Fuel\Core\Response::redirect_back();
            }
        } else {
            Fuel\Core\Response::redirect(\Fuel\Core\Router::get('404'));
        }
    }
    
    public function action_drop_promo($id = null, $related_id = null) {
        if(isset($id) and isset($related_id) and $model = Model_Content::find($id) and $rmodel = Model_Category::find($related_id)) {
            try {
                unset($model->promoted_category[$related_id]);
                $model->save();
            } catch (Exception $ex) {
                \Fuel\Core\Session::set_flash('error', 'Чтото не так');
            }
            
            \Fuel\Core\Session::set_flash('success', 'Категория успешно отвязана');
            Fuel\Core\Response::redirect_back();
            
        } else {
            Fuel\Core\Response::redirect(\Fuel\Core\Router::get('404'));
        }
            
    }
        
}
