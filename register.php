<?php

require_once("core/helpers.php");
require_once ("core/init.php");

/**
 * @var PDO $con
 * @var Array $categories
 */
$errors=[];
$user=$_POST;

$rules=[
    'name'=>function(){
    return validateFilled('name');
    },
    'email' => function(){
    return validateEmail('email');
    },
    'password' =>function(){
    return validateFilled('password');
    }
];



if($_SERVER['REQUEST_METHOD']=='POST' ){
    foreach ($user as $key => $value){
        if(isset($rules[$key])){
            $rule=$rules[$key];
            $errors[$key]=$rule();
        }
    }
}
$errors=array_filter($errors);
    if($_SERVER['REQUEST_METHOD']=='POST' && empty($errors)){

    $user['password']=password_hash($user['password'], PASSWORD_DEFAULT); //хэшируем пароль

    //выполняем запрос на получение пользователя с указанным email
    $stmt=$con->prepare('SELECT * from users WHERE email=:email');
    $stmt->execute(['email'=>$user['email']]);

    //если количество записей не равно нулю, то пользователь с такой почтой уже есть, добавят нельзя. формируем ошибку
    if($stmt->rowCount() !=0){
        $errors['email']='Пользователь с этим email уже зарегистрирован';
    } else{
        $stmt=$con->prepare('INSERT INTO users SET name=:name, email=:email, password=:password');
        $stmt->execute($user);
        header("Location: login.php");
    }
    
}
$registerContent=include_template('register-template.php',[
    'errors'=>$errors
]);
$page =include_template('layout.php',[
    'isAuth'=>$isAuth,
    'content'=>$registerContent
]);

print ($page);
?>
