<?php

class Controller_Home_Category extends Controller_Home {
    
    public function action_view ($category_alias = null) {
        $alias = Fuel\Core\Request::active()->param('alias');
        if($model = Model_Category::query()->where('alias', '=', $alias)->get_one()) {
            $this->template->set_global('page', $model, false);
            $this->template->set_global('meta_keywrd', $model->meta);
            $this->template->set_global('title', $model->page_title);//$current_category_id
            $this->template->set_global('current_category_id', $model->id);
            $this->template->set_global('current_category', $model, false);
            $base_url = '';
            if($id = Fuel\Core\Request::active()->param('parent_category') and $pmodel = Model_Category::find($id)) {
                $this->template->set_global('parent', $pmodel, false);
                $this->template->set_global('page', $pmodel, false);
                $base_url = \Fuel\Core\Router::get('view_subsidiary_category', array('alias' => $model->alias, 'parent_category' => $id));
            } else {
                $base_url = \Fuel\Core\Router::get('view_category', array('alias' => $model->alias));
            }
            
            $count = count($model->content);
            $per_page = 18;
            $config = array(
                'pagination_url' => $base_url,
                'total_items'    => $count,
                'per_page'       => $per_page,
                'uri_segment'    => 'page',
                'template' => array(
                    'wrapper_start' => '<div class="pagination"> ',
                    'wrapper_end' => ' </div>', 
                    'previous-inactive-link' => '<a href="{uri}"> Prev </a>',
                    'next-link' => '\t\t<a href="{uri}"> i </a>\n',
                    'previous-inactive' => '<span class="previous-inactive">\n\t{link}\n</span>\n',
                ),
            );

            $pagination = Pagination::forge('category_pagination', $config);

            $content = $model->get_content($per_page, $pagination->offset);
                    /*Model_Content::query()
                    ->related('master_categories')
                    ->related('master_categories.master_category')
                    ->where('master_categories.master_category.id', '=', $model->id)
                    ->or_where('master_categories.id', '=', $model->id)
                    ->limit($per_page)
                    ->offset($pagination->offset)
                    ->get();*///($this->lang_id, $category_alias, $pagination->per_page, $pagination->offset);
            
            $this->template->content = \TCCore\TCTheme::load_view('page/view', array(
                'content' => $content, 
                'pagination' => $pagination->render(), 
                'total' => (round($count / $per_page)) ? round($count / $per_page) : 1
            ));	
            
            
            
            //$this->template->content = \TCCore\TCTheme::load_view('category/view');
            
        } else {
            \Fuel\Core\Response::redirect(\Fuel\Core\Router::get('404'));
        }
        
    }
}
