<?php
namespace Core\Database;

class Connector
{

    public static function getConnection($config)
    {
        return new \PDO(
            "{$config['connection']}:
            host={$config['host']};
            dbname={$config['dbname']}",
            $config['user'],
            $config['password'],
            $config['options']
        );
    }
}