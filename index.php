<?php
$isAuth = (bool) rand(0,1);

$categories=[
        "Путешествия",
        "Наука и технологии",
        "Лайфхаки",
        "Мотивация",
        "Переводы песен",
        "Фильмы и сериалы"
];
$posts=[
        [
                "title"=>"Опасные жесты в разных странах",
                "category"=>"Путешествия",
                "photo"=>"img/1.jpg"
        ],
    [
        "title"=>"IT словарь и популярные компьютерные термины",
        "category"=>"Наука и технологии",
        "photo"=>"img/2.jpg"
    ],
    [
        "title"=>"Лайфхаки для запоминания новых английских слов",
        "category"=>"Лайфхаки",
        "photo"=>"img/3.jpg"
    ]

];
?>
<!doctype html>
<html lang="ru">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Бложик</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
        <link rel="stylesheet" href="css/utility.css">
    </head>
    <body class="d-flex flex-column">
    <header>
        <div class="container">
            <div class="row bg-dark text-white p-3 align-items-center text-center">
                <div class="col-md-4 text-md-left text-start">
                    <h1>Блог обо всем</h1>
                </div>
                <div class="col-md-8 text-md-right text-end">
                <?php if ($isAuth==true): ?>
                        <a class="btn btn-success" href="#" role="button">Добавить пост</a>
                        <a class="btn btn-warning" href="/auth" role="button">Мои посты</a>
                        <a class="btn btn-secondary" href="/auth" role="button">Выйти</a>
                    <?php else: ?>
                        <a class="btn btn-primary" href="/auth" role="button">Регистрация</a>
                        <a class="btn btn-primary" href="/auth" role="button">Войти</a>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </header>
    <main class="m-2 flex-grow-1">
        <div class="container">
            <div class="row justify-content-center m-3">
                <div class="col-6">
                    <form action="">
                        <input type="text" class="form-control" placeholder="Поиск. Введите название и нажмите Enter">
                    </form>
                </div>
            </div>
            <div class="row justify-content-center m-3">
                <ul class="list-group list-group-horizontal justify-content-center">
                    <?php foreach ($categories as $category):?>
                    <li class="list-group-item bg-dark"><a class="text-white" href="#"><?= $category; ?></a></li>
                    <?php endforeach;?>
                  </ul>
            </div>
            <div class="posts row">
                <?php foreach ($posts as $post): ?>
                <div class="col-md-4">
                    <div class="card mb-4">
                        <img src="<?= $post["photo"]?>" class="card-img-top" alt="...">
                        <div class="card-body">
                            <p class="text-secondary"><?= $post["category"]?></p>
                            <h5 class="card-title"><?= $post["title"]?></h5>
                            <a href="/single" class="btn btn-primary">Подробнее</a>
                        <?php if($isAuth===true):?>
                            <div class="mt-2">
                                <a href="/single" class="btn btn-secondary">Редактировать</a>
                                <a href="/single" class="btn btn-danger">Удалить</a>
                            </div>
                        <?php endif; ?>
                        </div>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
        </div>
    </main>
    <footer>
        <div class="container">
            <div class="row">
                <div class="col-12 bg-dark text-white p-3">
                    <p class="text-center align-self-center mb-0">Все права соблюдены 2021</p>
                </div>
            </div>
        </div>
    </footer>
    </body>
</html>