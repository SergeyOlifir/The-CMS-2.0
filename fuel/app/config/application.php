<?php

return array(
    'logo' => array(
        'upload' => array(
            'path' => DOCROOT.'files',
            'randomize' => true,
            'normalize' => true,
            'type_whitelist' => array('image')
        ),
        'sizes' => array(
            'list' => array(
                'width'  => 270,
                'height' => 150,
            ),
            'tile' => array(
                'width'  => 250,
                'height' => 250,
            ),
            'thumb' => array(
                'width'  => 110,
                'height' => 100,
            ),
            'small' => array(
                'width' => 800,
                'height' => 800,
            ),
        )
    ),
    'galery' => array(
        'upload' => array(
            'path' => DOCROOT.'files',
            'randomize' => true,
            'normalize' => true,
            'type_whitelist' => array('image')
        ),
        'sizes' => array(
            'thumb' => array(
                'width' => 150,
                'height' => 150,
            ),
            'galery' => array(
                'width' => 700,
                'height' => 600,
            ),
            'full' => array(
                'width' => 1024,
                'height' => 768,
            ),
            'list' => array(
                'width'  => 270,
                'height' => 150,
            ),
            'tile' => array(
                'width'  => 250,
                'height' => 250,
            ),
            'small' => array(
                'width' => 800,
                'height' => 800,
            ),
        ),
    ),
    
    'mail_feedback' => array(
        'from' => array(
            'adress' => 'noreply@montevoyage.com',
            'name' => 'Marengo',
        ),

        'to' => array(
            'adress' => 'sergey.olifir@gmail.com',
            'name' => 'Marengo',
        ),
        
    ),
);

