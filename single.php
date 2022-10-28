<!doctype html>
<html lang="ru">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Бложик</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
        <link rel="stylesheet" href="css/utility.css">
    </head>
    <body class="d-flex flex-column bg-light">
        <header>
            <div class="container">
                <div class="row bg-dark text-white p-3 align-items-center text-center">
                    <div class="col-md-4 text-md-left text-start">
                        <h1>Блог обо всем</h1>
                    </div>
                    <div class="col-md-8 text-md-right text-end">
                        <a class="btn btn-success" href="#" role="button">Добавить пост</a>
                        <a class="btn btn-warning" href="/auth" role="button">Мои посты</a>
                        <a class="btn btn-secondary" href="/auth" role="button">Выйти</a>
                        <a class="btn btn-primary" href="/auth" role="button">Регистрация</a>
                        <a class="btn btn-primary" href="/auth" role="button">Войти</a>
                    </div>
                </div>
            </div>
        </header>
    <main class="m-2 flex-grow-1">
        <div class="container">
            <div class="row justify-content-center m-3">
                <div class="col-6">
                    <form action="">
                        <input type="text" class="form-control" placeholder="Поиск. Введи название и нажмите Enter">
                    </form>
                </div>
            </div>
            <div class="row justify-content-center m-3">
                <ul class="list-group list-group-horizontal justify-content-center">
                    <li class="list-group-item bg-dark"><a class="text-white" href="#">Путешествия</a></li>
                    <li class="list-group-item bg-dark"><a class="text-white" href="#">Наука и технологии</a></li>
                    <li class="list-group-item bg-dark"><a class="text-white" href="#">Лайфхаки</a></li>
                    <li class="list-group-item bg-dark"><a class="text-white" href="#">Мотивация</a></li>
                    <li class="list-group-item bg-dark"><a class="text-white" href="#">Переводы песен</a></li>
                    <li class="list-group-item bg-dark"><a class="text-white" href="#">Фильмы и сериалы</a></li>
                </ul>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="card mb-4">
                        <img src="img/1.jpg" class="card-img-top card" alt="...">
                        <div class="card-body">
                            <span class="text-secondary">Категория</span>
                            <h1 class="card-title">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cum, dolore.</h1>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Assumenda at blanditiis dolor illo nobis obcaecati optio tempore! Adipisci aut blanditiis culpa delectus earum expedita impedit libero magni obcaecati placeat praesentium quia quidem rem saepe sed similique sint sit suscipit tempora, tenetur? Aut consectetur cupiditate id illo laborum sunt totam voluptate!</p>
                            <a href="/edit" class="btn btn-primary">Редактировать</a>
                            <a href="#" class="btn btn-danger">Удалить</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row pt-3">
                <div class="col">
                    <h4 class="pt-2">Комментарии</h4>
                </div>
            </div>
            <div class="row pt-3">
                <div class="col">
                    <form method="post" action="">
                        <div class="mb-3 form-group">
                            <label for="text" class="sr-only">Комментарий</label>
                            <textarea class="form-control" id="text" name="text" rows="3" placeholder="Оставьте комментарий..." required></textarea>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-success mb-2">Отправить</button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="row py-2 justify-content-center comments">
                <p>К этому посту никто ещё не оставлял комментариев. Станьте первым!</p>
                <div class="col-12 comment">
                    <hr>
                    <p class="m-0 text-secondary">22.03.21</p>
                    <h5 class="pt-2"><b>Кент Василий</b></h5>
                    <p>Читал бы и читал. The Best!</p>
                </div>
                <div class="col-12 comment">
                    <hr>
                    <p class="m-0 text-secondary">20.03.21</p>
                    <h5 class="pt-2"><b>John Doe</b></h5>
                    <p>What?!</p>
                  
                </div>
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
