<?php


$routers->get('task-list', 'TodoController@index');
$routers->post('task/add', 'TodoController@add');
$routers->post('task/actions', 'TodoController@actions');

$routers->get('', 'PageController@index');

$routers->get('table', 'PageController@table');

$routers->get('about', 'PageController@about');