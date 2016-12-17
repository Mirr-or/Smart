<?php
namespace Core\Database;

class Connector
{

    public static function getConnection($config)
    {
        return new \mysqli(
            $config['host'],
            $config['user'],
            $config['password'],
            $config['dbname']
        );
    }
}