<?php
return array(
    '_root_'  => 'home/index',  // The default route
    '_404_'   => 'welcome/404',    // The main 404 route
    '404'   => array('welcome/404', 'name' => '404'),
    'hello(/:name)?' => array('welcome/hello', 'name' => 'hello'),
    'page/(:alias)/(:parent_category)' => array('home/category/view', 'name' => 'view_subsidiary_category'),
    'page/(:alias)' => array('home/category/view', 'name' => 'view_category')
);
