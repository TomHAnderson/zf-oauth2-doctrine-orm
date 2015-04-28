<?php

namespace ZFTest\OAuth2\Doctrine;

return array(
    'doctrine' => array(
        'driver' => array(
            'odm_driver' => array(
                'class' => 'Doctrine\ODM\MongoDB\Mapping\Driver\XmlDriver',
                'paths' => array(__DIR__ . '/odm'),
            ),
            'odm_default' => array(
                'drivers' => array(
                    __NAMESPACE__ . '\Document' => 'odm_driver',
                ),
            ),

            'orm_driver' => array(
                'class' => 'Doctrine\\ORM\\Mapping\\Driver\\XmlDriver',
                'paths' => array(
                    0 => __DIR__ . '/orm',
                ),
            ),
            'orm_default' => array(
                'class' => 'Doctrine\\ORM\\Mapping\\Driver\\DriverChain',
                'drivers' => array(
                    __NAMESPACE__ . '\Entity' => 'orm_driver',
                ),
            ),
        ),
    ),
);
