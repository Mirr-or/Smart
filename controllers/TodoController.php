<?php

class TodoController
{

    public function index()
    {
        $title = 'Task-list';
        $pageTitle = 'Task-list';

        $taskList = App::get('query')->selectAll('todo');

        include "views/todo.view.php";
    }

    public function add()
    {
        $title = $_POST['task'];

        if (isset($title) && !empty($title)) {
            App::get('query')->insert('todo', [
                'title' => $title,
            ]);
        }
        Request::goBack();
    }

    public function actions()
    {
        if (isset($_POST["action"])) {
            switch ($_POST["action"]) {
                case "delete":
                    App::get('query')->delete('todo', $_POST['complete']);
                    break;

                case "update":
                    App::get('query')->update('todo', $_POST['complete']);
                    break;
            }
            Request::goBack();
        }
    }
}