<?php
return array(
    '_root_'  => 'home/index',  // The default route
    '_404_'   => 'welcome/404',    // The main 404 route
    '404'   => array('welcome/404', 'name' => '404'),
    '(:lang)/page/(:alias)/(:parent_category)' => array('home/category/view', 'name' => 'view_subsidiary_category_with_lang'),
    '(:lang)/page/(:alias)' => array('home/category/view', 'name' => 'view_category_with_lang'),
    'page/(:alias)/(:parent_category)' => array('home/category/view', 'name' => 'view_subsidiary_category'),
    'page/(:alias)' => array('home/category/view', 'name' => 'view_category'),
    '(:lang)/article/(:id)/(:parent_category)' => array('home/content/view', 'name' => 'view_subsidiary_content_with_lang'),
    '(:lang)/article/(:id)' => array('home/content/view', 'name' => 'view_content_with_lang'),
    'article/(:id)/(:parent_category)' => array('home/content/view', 'name' => 'view_subsidiary_content'),
    'article/(:id)' => array('home/content/view', 'name' => 'view_content'),
    'admin' => array('admin/index', 'name' => 'view_content'),
    '(?P<lang>\w+?)' => array('home/index', 'name' => 'root_with_lang'),
);
