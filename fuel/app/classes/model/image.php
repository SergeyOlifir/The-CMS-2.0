<?php

class Model_Image extends Model_Base {
    protected static $_properties = array(
        'id',
        'origin',
        'thumb',
        'galery',
        'full',
        'list',
        'tile',
        'small',
        'owner_id',
        'owner_type',
        'title',
        'created_at',
        'updated_at',
    );
    
    protected static $_observers = array(
        'Orm\Observer_CreatedAt' => array(
            'events' => array('before_insert'),
            'mysql_timestamp' => false,
        ),
        'Orm\Observer_UpdatedAt' => array(
            'events' => array('before_save'),
            'mysql_timestamp' => false,
        ),
        'Orm\Observer_ImageSaver' => array(
            'events' => array('before_save'),
            'mysql_timestamp' => false,
        )
    );
}

