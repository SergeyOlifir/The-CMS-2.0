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
}
