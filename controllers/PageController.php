<?php
namespace App;

use core\App;
use core\Request;

class PageController
{

    public function index()
    {
        $title = 'Главная';
        $pageTitle = 'Главная';
        $resultsAll = App::get('query')->selectAll('calc');

        include "views/index.view.php";
    }

    public function calc()
    {
        $regex = '#\d*([+/*-])\d*#';
        $calc = $_POST['calc'];
        preg_match($regex, $calc, $matches);

        if (isset($calc) && !empty($calc)) {
            list($a, $b) = explode($matches[1], $calc);

            switch ($matches[1]) {
                case '+':
                    $result = $a + $b;
                    break;
                case '-':
                    $result = $a - $b;
                    break;
                case '*':
                    $result = $a * $b;
                    break;
                case '/':
                    $result = $a / $b;
                    break;
            }

        $results = "$calc = $result";


            App::get('query')->insert('calc', [
                'result' => $results,
            ]);
        }

        Request::goBack();
    }

    public function remove()
    {
        $remove = $_POST['result'];

        if (isset($remove) && !empty($remove)) {
            App::get('query')->delete('calc', $remove);
        }
            Request::goBack();
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