<?php

return [
    'service_manager' => [
        'invokables' => [
            'ZF\OAuth2\Doctrine\Adapter\DoctrineAdapterFactory' => 'ZF\OAuth2\Doctrine\Adapter\DoctrineAdapterFactory',
            'ZF\OAuth2\Doctrine\Adapter\DoctrineAdapter' => 'ZF\OAuth2\Doctrine\Adapter\DoctrineAdapter',
        ],
        'factories' => [
            'ZF\OAuth2\Doctrine\Mapper\AbstractMapper' => 'ZF\OAuth2\Doctrine\Mapper\Factory\AbstractMapperFactory',
            'ZF\OAuth2\Doctrine\Mapper\MapperManager' => '\ZF\OAuth2\Doctrine\Mapper\Factory\MapperManagerFactory'
        ],
        'shared' => [
            'ZF\OAuth2\Doctrine\Adapter\DoctrineAdapterFactory' => false,
            'ZF\OAuth2\Doctrine\Mapper\MapperManager' => false,
        ],
    ],

    'zf-apigility-doctrine-query-create-filter' => [
        'initializers' => [
            'ZF\OAuth2\Doctrine\Query\OAuth2ServerInitializer',
        ],
    ],

    'zf-apigility-doctrine-query-provider' => [
        'initializers' => [
            'ZF\OAuth2\Doctrine\Query\OAuth2ServerInitializer',
        ],
    ],
];
