<?php

return array(
    'doctrine' => array(
        'configuration' => array(
            'odm_default' => array(
                'defaultDB' => 'zf_oauth2_doctrine_test',
            ),
        ),
        'connection' => array(
            'odm_default' => array(
                'server' => 'localhost',
                'port' => '27017',
                'user' => '',
                'password' => '',
                'dbname' => 'zf_oauth2_doctrine_test',
            ),
        ),
    ),
);
