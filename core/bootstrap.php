<?php
use Core\App;
use Core\Database\Connector;
use Core\Database\QueryBuilder;

session_start();

require_once "vendor/autoload.php";

App::set('config', require_once "config.php");
App::set('query', new QueryBuilder( Connector::getConnection(App::get('config')['database']) ));
