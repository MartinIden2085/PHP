<div class="container text-center h-100">
    <div class="row justify-content-center align-items-center h-100">
        <div class="col-md-3">
            <form method="post">
                <div class="form-group m-3">
                    <input type="text" class="form-control" placeholder="Введите имя" name="name">
                </div>
                <div class="form-group m-3">
                    <input type="text" class="form-control" placeholder="Введите email" name="email">
                    <span class="text-danger"> <?= $errors['email'] ?? "" ?></span>
                </div>
                <div class="form-group m-3">
                    <input type="password" class="form-control" placeholder="Пароль" name="password">
                </div>
                <button type="submit" class="btn btn-primary">Зарегистрироваться</button>
            </form>
        </div>
    </div>
</div>
