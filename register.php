<?php

require_once("core/helpers.php");
require_once ("core/init.php");

/**
 * @var PDO $con
 * @var Array $categories
 */

if($_SERVER['REQUEST_METHOD']=='POST'){
    $user=$_POST;
    $user['password']=password_hash($user['password'], PASSWORD_DEFAULT); //хэшируем пароль(валера не трогай комментарий, мне нужно)

    //выполняем запрос на получение пользователя с указанным email
    $stmt=$con->prepare('SELECT * from users WHERE email=:email');
    $stmt->execute(['email'=>$user['email']]);

    //если количество записей не равно нулю, то пользователь с такой почтой уже есть, добавят нельзя. формируем ошибку
    if($stmt->rowCount() !=0){
        $errors['email']='Пользователь с этим email уже зарегистрирован';
    } else{
        $stmt=$con->prepare('INSERT INTO users SET name=:name, email=:email, password=:password');
        $stmt->execute($user);
    }

}

$isAuth = (bool) rand(0,1);

$page =include_template('layout.php',[
    'isAuth'=>$isAuth,
    'content'=>$registerContent
]);
print ($page);
?>
