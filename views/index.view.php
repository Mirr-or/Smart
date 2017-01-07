<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title><?= $title ?></title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css">
</head>
<body>
<h1><?= $pageTitle ?></h1>
<div class="container">
        <form class="form-inline" action="/calc" method="post">
                <div class="form-group">
                        <input type="text" class="form-control" name="calc" placeholder="2+2">
                        <button class="btn btn-default">=</button>
                    </div>
            </form>
    <hr>
    <form action="remove" class="form-inline" method="post">
        <select name="remove" class="form-control" id="result">
            <option value=""></option>
            <option value="delete">Удалить</option>
        </select>
        <input type="submit" class="btn btn-default">
        <ul class="list-group">
            <?php foreach($resultsAll as $result): ?>
                              <li class="list-group-item">
                                  <span class="badge"><input type="checkbox" name="result[]" value="<?= $result->id ?>"></span>
                                  <?= $result->result ?>
                              </li>
                <?php endforeach; ?>
            </ul>
    </form>
    </div>
</body>
</html>