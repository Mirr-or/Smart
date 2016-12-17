<?php
use Core\Router;

require_once "core/bootstrap.php";

Router::load('routers')
    ->run();