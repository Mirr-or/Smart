<?php

class TodoController
{

    public function index()
    {
        $title = 'Task list';
        $pageTitle = 'Task list';

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
        $action = $_POST["action"];
        $complete = $_POST['complete'];

        if (isset($action)) {
            switch ($action) {
                case "delete":
                    App::get('query')->delete('todo', $complete);
                    break;

                case "update":
                    App::get('query')->update('todo', $complete);
                    break;
            }
            Request::goBack();
        }
    }
}