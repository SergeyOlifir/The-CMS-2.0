<?php

class Controller_Admin_Category extends Controller_Admin {
    
    public function action_index () {
        $this->template->header = 'Категории';
        $this->template->description = 'Список';
        $this->template->models = Model_Category::find('all');
        $this->template->content = \Fuel\Core\View::forge('admin/category/index', array('models' => Model_Category::find('all')));
        
    }
    
    public function action_create () {
        
        $this->template->header = 'Категории';
        $this->template->description = 'Добавьте новую';
        $this->template->content = \Fuel\Core\View::forge('admin/category/create');
        
        if(Fuel\Core\Input::post()) {
            if(Model_Category::get_validator()->run()) {
                $fields = Model_Category::get_validator()->validated();
                $config = \Config::get('application.galery.upload');
                Upload::process($config);
                if (Upload::is_valid()) {
                    Upload::save();
                    $logo = Model_Image::forge();
                    try {
                        $logo->save();
                    } catch (Exception $ex) {
                        $this->template->set_global('model', Model_Category::forge($fields));
                        $this->template->set_global('errors', e(array('image' => $ex)));
                        \Fuel\Core\Session::set_flash('error', 'Ошибки валидации');
                        return;
                    }

                    $fields['image'] = $logo->id;

                } else {
                    if(\Fuel\Core\Upload::get_errors('image')['file'] !== '') {
                        $this->template->set_global('model', Model_Category::forge($fields));
                        $this->template->set_global('errors', e(array('image' => $ex)));
                        \Fuel\Core\Session::set_flash('error', 'Ошибки валидации');
                        return;
                    }
                }
                $model = Model_Category::forge($fields);
                try {
                    $model->save();
                } catch (Exception $ex) {
                    \Fuel\Core\Session::set_flash('error', 'Ошибка создания категории! Категория не создана!!');
                }
                
                \Fuel\Core\Session::set_flash('success', 'Категория успешно создана');
                Fuel\Core\Response::redirect('/admin/category/view/' . $model->id);
                
            } else {
                $this->template->set_global('model', Model_Category::forge(Fuel\Core\Input::post()));
                $this->template->set_global('errors', e(Model_Category::get_validator()->error()));
                \Fuel\Core\Session::set_flash('error', 'Ошибки валидации');
            }
        }
        
        
    }
    
    public function action_edit ($id = null) {
        if($id and $model = Model_Category::find($id)) {
            $this->template->header = 'Категории';
            $this->template->description = 'Редактирование';
            $this->template->content = \Fuel\Core\View::forge('admin/category/edit');
            if(Fuel\Core\Input::post()) {
                if(Model_Category::get_validator()->run()) {
                    $fields = Model_Category::get_validator()->validated();
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
                        \Fuel\Core\Session::set_flash('error', 'Ошибка обновления категории! Категория не обновлена!!');
                    }
                    
                    \Fuel\Core\Session::set_flash('success', 'Категория успешно обновлена!');
                    Fuel\Core\Response::redirect('/admin/category/view/' . $model->id);
                    
                } else {
                    $model->from_array(Fuel\Core\Input::post());
                    $this->template->set_global('errors', e(Model_Category::get_validator()->error()));
                    \Fuel\Core\Session::set_flash('error', 'Ошибки валидации');
                }
            }
            
            $this->template->set_global('model', $model);
            
            
        } else {
            Fuel\Core\Response::redirect(\Fuel\Core\Router::get('404'));
        }
    }
    
    public function action_delete ($id = null) {
        if(isset($id) and $model = Model_Category::find($id)) {
            try {
                $model->delete();
                \Fuel\Core\Session::set_flash('success', 'Категория успешно удаленa!');
                Fuel\Core\Response::redirect('/admin/category/index');
            } catch (Exception $ex) {
                \Fuel\Core\Session::set_flash('error', 'Ошибка удаления категории! Категория не удалена!!');
            }
        } else {
            Fuel\Core\Response::redirect(\Fuel\Core\Router::get('404'));
        }
    }
    
    public function action_view ($id) {
        if(isset($id) and $model = Model_Category::find($id)) {
            $this->template->set_global('model', $model, false);
            $this->template->set_global('models', Model_Category::find('all'), false);
            $this->template->header = 'Категории';
            $this->template->description = 'Просмотр';
            $this->template->content = \Fuel\Core\View::forge('admin/category/view');
        } else {
            Fuel\Core\Response::redirect(\Fuel\Core\Router::get('404'));
        }
    }
    
    public function action_unset($id = null, $related_id = null) {
        if(isset($id) and isset($related_id) and $model = Model_Category::find($id) and $rmodel = Model_Category::find($related_id)) {
            try {
                unset($model->subsidiary_category[$related_id]);
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

    public function  action_set ($id = null) {
        if(isset($id) and $model = Model_Category::find($id)) {
            if(\Fuel\Core\Input::post() && count(\Fuel\Core\Input::post('relations')) > 0) {
                foreach (\Fuel\Core\Input::post('relations') as $related_id) {
                    if($related_model = Model_Category::find((int)$related_id)) {
                        $model->subsidiary_category[] = $related_model;
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
    
    public function action_setto ($id = null) {
        if(isset($id) and $model = Model_Category::find($id)) {
            if(\Fuel\Core\Input::post() && count(\Fuel\Core\Input::post('relations')) > 0) {
                foreach (\Fuel\Core\Input::post('relations') as $related_id) {
                    if($related_model = Model_Category::find((int)$related_id)) {
                        //$related_model->related_category[] = $model;
                        $model->master_category[] = $related_model;
                        
                    }
                }
                
                try {
                    $model->save();	
                } catch (Exception $ex) {
                    \Fuel\Core\Session::set_flash('error', 'Чтото не так');
                    return Fuel\Core\Response::redirect_back();
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
    
    public function  action_setrelation ($id = null) {
        if(isset($id) and $model = Model_Category::find($id)) {
            if(\Fuel\Core\Input::post() && count(\Fuel\Core\Input::post('relations')) > 0) {
                foreach (\Fuel\Core\Input::post('relations') as $related_id) {
                    if($related_model = Model_Category::find((int)$related_id)) {
                        $model->related_category[] = $related_model;
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
    
    public function action_setrelationto ($id = null) {
        if(isset($id) and $model = Model_Category::find($id)) {
            if(\Fuel\Core\Input::post() && count(\Fuel\Core\Input::post('relations')) > 0) {
                foreach (\Fuel\Core\Input::post('relations') as $related_id) {
                    if($related_model = Model_Category::find((int)$related_id)) {
                        //$related_model->related_category[] = $model;
                        $model->related_to_category[] = $related_model;
                        
                    }
                }
                
                try {
                    $model->save();	
                } catch (Exception $ex) {
                    \Fuel\Core\Session::set_flash('error', 'Чтото не так');
                    return Fuel\Core\Response::redirect_back();
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
    
    public function action_unsetrelation($id = null, $related_id = null) {
        if(isset($id) and isset($related_id) and $model = Model_Category::find($id) and $rmodel = Model_Category::find($related_id)) {
            try {
                unset($model->related_category[$related_id]);
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
    
    public function action_add_content($id = null) {
        if(isset($id) and $model = Model_Category::find($id)) {
            if(\Fuel\Core\Input::post() && count(\Fuel\Core\Input::post('relations')) > 0) {
                foreach (\Fuel\Core\Input::post('relations') as $related_id) {
                    if($related_model = Model_Content::find((int)$related_id)) {
                        $model->content[] = $related_model;
                    }
                }
                try {
                    $model->save();	
                    
                } catch (Exception $ex) {
                    \Fuel\Core\Session::set_flash('error', 'Чтото не так');
                }
                \Fuel\Core\Session::set_flash('success', 'Контент успешно добавлен');
                Fuel\Core\Response::redirect_back();
                
            } else {
                \Fuel\Core\Session::set_flash('error', 'Чтото не так');
                Fuel\Core\Response::redirect_back();
            }
        } else {
            Fuel\Core\Response::redirect(\Fuel\Core\Router::get('404'));
        }
    }
    
    public function action_drop_content($id = null, $content_id = null) {
        if(isset($id) and isset($content_id) and $model = Model_Category::find($id) and $cmodel = Model_Content::find($content_id)) {
            try {
                unset($model->content[$content_id]);
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
}

