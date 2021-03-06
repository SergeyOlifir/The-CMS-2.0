<?php

class Controller_Home_Content extends Controller_Home {
    
    public function action_view () {
        $id = Fuel\Core\Request::active()->param('id');
        if(isset($id) and $model = Model_Content::find($id)) {
            if ($model->language_id != TCLocal::getCurrentLangID() && Model_Language::query()->count() > 0) {
                \Fuel\Core\Response::redirect(TCRouter::get('root'));
            }
            $parent_category_id = Fuel\Core\Request::active()->param('parent_category');
            $this->template->set_global('content', $model, false);
            $this->template->set_global('meta_keywrd', $model->meta);
            $this->template->set_global('title', $model->page_title);
            $this->template->content = TCCore\TCTheme::load_view('content/view', array(
                'parent_category' => Model_Category::find($parent_category_id)
            ));
        } else {
            Fuel\Core\Response::redirect(\Fuel\Core\Router::get('404'));
        }
    }
}

