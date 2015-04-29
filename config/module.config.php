<?php

return array(
    'service_manager' => array(
        'abstract_factories' => array(
            'ZF\OAuth2\Doctrine\Factory\DoctrineMapperFactory',
        ),
        'factories' => array(
            'ZF\OAuth2\Doctrine\Adapter\OrmDoctrineAdapter' =>
                'ZF\OAuth2\Doctrine\Factory\OrmDoctrineAdapterFactory',
            'ZF\OAuth2\Doctrine\Adapter\OdmDoctrineAdapter' =>
                'ZF\OAuth2\Doctrine\Factory\OdmDoctrineAdapterFactory',
        ),
    ),
);
