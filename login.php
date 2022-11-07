<?php

require_once("core/init.php");

/**
 * @var PDO $con
 */
$errors=[];
$user=$_POST;
$rules=[
    "email" => function(){
    return validateEmail("email");
    },
    "password" => function(){
    return validateFilled('password');
    }
];

if ($_SERVER["REQUEST_METHOD"]=="POST"){
    foreach ( $user as $key => $value) {
        if(isset($rules[$key])){
            $rule= $rules[$key];
            $errors[$key]=$rule();
        }

    }
}
$errors=array_filter($errors);

if($_SERVER['REQUEST_METHOD']=='POST' && empty($errors)){

    //выполняем запрос на получение пользователя с указанным email
    $stmt= $con->prepare('SELECT * from users WHERE email=:email');
    $stmt->execute(['email'=>$user['email']]);

    //если количество записей не равно нулю, то пользователь с такой почтой уже есть, добавят нельзя. формируем ошибку
    if($stmt->rowCount() !=0){
        $errors['email']='Пользователь с этим email уже зарегистрирован';
    } else{
        $dbUser=$stmt->fetch();
        if(password_verify($user["password"],$dbUser["password"])){
        $_SESSION["user_id"]=$dbUser["id"];
        $_SESSION["user_name"]=$dbUser["name"];
        header("Location: login.php");
        } else{
            $errors["password"]="Неверный пароль";
        }
    }
}


$loginContent=include_template('login-template.php',[
   "errors"=>$errors
]);

$page =include_template('layout.php',[
   'isAuth'=>$isAuth,
   'content'=>$loginContent
]);
print ($page);
?>
