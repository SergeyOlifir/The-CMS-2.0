<?php
return array(
	'_root_'  => 'welcome/index',  // The default route
	'_404_'   => 'welcome/404',    // The main 404 route
	'404'   => array('welcome/404', 'name' => '404'),
	'hello(/:name)?' => array('welcome/hello', 'name' => 'hello'),
);
