<?php

return array(
    'doctrine' => array(
        'connection' => array(
            'orm_default' => array(
                'driverClass' => 'Doctrine\DBAL\Driver\PDOMySql\Driver',
                'params' => array(
                    'host' => '127.0.0.1',
                    'port' => '3306',
                    'dbname' => 'CRUDZF2',
//                    'driverOptions' => array(
//                        \PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'UTF-8'"
//                    ),
                ),
            ),
        ),
    ),
);
