<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title><?= $title ?></title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
<h1><?= $pageTitle ?></h1>
<div class="container">
    <form class="form-inline" action="/task/add" method="post">
        <div class="form-group">
            <input name="task" type="text" class="form-control" id="task" placeholder="Задача">
        </div>
        <button type="submit" class="btn btn-default">Добавить задачу</button>
    </form>
    <hr>
    <form action="/task/actions" class="form-inline" method="post">
        <select name="action" class="form-control" id="action-task">
            <option value="update">Пометить как сделано!</option>
            <option value="delete">Удалить</option>
        </select>
        <input type="submit" class="btn btn-default">
        <ul class="list-group">
            <?php foreach($taskList as $task): ?>
                <?php if($task['complete']): ?>
                    <li class="list-group-item"><s><?= $task['title'] ?></s></li>
                <?php else: ?>
                    <li class="list-group-item"><input type="checkbox" name="complete[]" value="<?=$task['id']?>">
                        <?= $task['title'] ?>
                    </li>
                <?php endif ?>
            <?php endforeach; ?>
        </ul>
    </form>
</div>
</body>
</html>