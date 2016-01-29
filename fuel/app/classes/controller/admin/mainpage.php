<?php

class Controller_Admin_Mainpage extends Controller_Admin {
    
    public function action_edit() {
        $model = Model_MainPage::query()->get_one();
        $this->template->set_global('model', $model);
        $this->template->content = Fuel\Core\View::forge('admin/mainpage/edit');
        
        if(Fuel\Core\Input::post()) {
            if(Model_MainPage::get_validator()->run()) {
                $fields = Model_MainPage::get_validator()->validated();
                $model->from_array($fields);
                try {
                    $model->save();
                    \Fuel\Core\Session::set_flash('success', 'Категория успешно обновлена!');
                    Fuel\Core\Response::redirect_back();
                } catch (Exception $ex) {
                    \Fuel\Core\Session::set_flash('error', 'Ошибка обновления главной! Главная страница не обновлена!!');
                }   
            } else {
                $model->from_array(Fuel\Core\Input::post());
                $this->template->set_global('errors', e(Model_MainPage::get_validator()->error()));
                \Fuel\Core\Session::set_flash('error', 'Ошибки валидации');
            }
        }
    }
    
    public function action_add_image() {
        $model = Model_MainPage::query()->get_one();
        $config = \Config::get('application.galery.upload');
        Upload::process($config);
        if ((count(\Fuel\Core\Upload::get_files()) > 0) and Upload::is_valid()) {
            Upload::save();
            $logo = Model_Image::forge(array(
                'owner_id' => $model->id,
                'owner_type' => get_class($model)
            ));
            try {
                $logo->save();
            } catch (Exception $ex) {
                $this->template->set_global('errors', e(array('image' => $ex)));
                \Fuel\Core\Session::set_flash('error', 'Ошибки валидации');
                return;
            }

            \Fuel\Core\Session::set_flash('success', 'Изображение привязано');

        } else {
            if(\Fuel\Core\Upload::get_errors('image')['file'] !== '') {
                \Fuel\Core\Session::set_flash('error', 'Ошибки валидации');
                return;
            }

        }
        
        Fuel\Core\Response::redirect_back();
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

    public function action_edit_image_label() {
        if(Fuel\Core\Input::post()) {
            $imageID = \Fuel\Core\Input::post('imageID');
            $label = \Fuel\Core\Input::post('title');
            $model = Model_Image::find($imageID);
            $model->title = $label;
            try {
                $model->save();
                \Fuel\Core\Session::set_flash('success', 'Описание картинки успешно обновлено!');
                Fuel\Core\Response::redirect_back();
            } catch (Exception $ex) {
                echo('<pre>');
                var_dump($ex);
                die();
                \Fuel\Core\Session::set_flash('error', 'Ошибка обновления картинки! Описание не обновлено!!');
                Fuel\Core\Response::redirect_back();
            }
        }
    }
    
    public function action_add_promo($id = null) {
        if($model = Model_MainPage::query()->get_one()) {
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
        if(isset($related_id) and $model = Model_MainPage::query()->get_one() and $rmodel = Model_Category::find($related_id)) {
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
    
    public function action_add_featured($id = null, $type = 1) {
        if($model = Model_MainPage::query()->get_one()) {
            if(\Fuel\Core\Input::post() && count(\Fuel\Core\Input::post('relations')) > 0) {
                foreach (\Fuel\Core\Input::post('relations') as $related_id) {
                    //TODO Fix this
                    if($related_model = Model_Category::find((int)$related_id)) {
                        $query = Fuel\Core\DB::insert('featured_category_in_mainpage');
                        $query->columns(array(
                            'main_id',
                            'type',
                            'category_id'
                        ));
                        $query->values(array(
                            $model->id,
                            $type,
                            $related_model->id,
                        ));
                        try {
                            $query->execute();	
                            \Fuel\Core\Session::set_flash('success', 'Категории успешно привязаны');
                        } catch (Exception $ex) {
                            \Fuel\Core\Session::set_flash('error', 'Чтото не так');
                        }
                    }
                }
                
            } else {
                \Fuel\Core\Session::set_flash('error', 'Чтото не так');
                Fuel\Core\Response::redirect_back();
            }
        } else {
            Fuel\Core\Response::redirect(\Fuel\Core\Router::get('404'));
        }
        
        Fuel\Core\Response::redirect_back();

    }
    
    public function action_remove_featured($type = null, $rid = 1) {
        if($model = Model_MainPage::query()->get_one()) {
            $query = DB::delete('featured_category_in_mainpage')
                ->where('featured_category_in_mainpage.category_id', '=', $rid)
                ->where('featured_category_in_mainpage.type', '=', $type);
            try {
                $query->execute();	
                \Fuel\Core\Session::set_flash('success', 'Категории успешно отвязаны');
            } catch (Exception $ex) {
                \Fuel\Core\Session::set_flash('error', 'Чтото не так');
            }
        } else {
            Fuel\Core\Response::redirect(\Fuel\Core\Router::get('404'));
        }
        
        Fuel\Core\Response::redirect_back();
    }
}
