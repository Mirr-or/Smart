<?php
namespace App;

class PageController
{

    public function index()
    {
        $title = 'Главная';
        $pageTitle = 'Главная';

        include "views/index.view.php";
    }

    public function table()
    {
        $rows = 10;
        $cols = 10;
        $color = '#369';

        $title = 'Таблица умножения';
        $pageTitle = 'Таблица умножения';

        include "views/table.view.php";
    }

    public function about()
    {
        $title = 'About us';
        $pageTitle = 'About us';

        require "views/about.view.php";
    }
}