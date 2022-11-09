<?php
require_once ("core/helpers.php");
require_once ("core/functions.php");

$db=(require_once('core/config.php'))['db'];
$dsn="{$db['driver']}:host={$db['host']};dbname={$db['name']};charset={$db['charset']}";
$options=[
    PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE=>PDO::FETCH_ASSOC,
    PDO::MYSQL_ATTR_INIT_COMMAND=>"SET NAMES {$db['charset']} COLLATE {$db['collate']}"
];

try{
    $con=new PDO($dsn, $db['login'], $db['password'], $options );
} catch (PDOException $e){
    die("Подключение к серверу MySQL не удалось - {$e->getMessage()}");
}

$categoriesObject=$con->query('SELECT * from categories');
$categories=$categoriesObject->fetchAll();

session_start();
$isAuth=isset($_SESSION["user_id"]);

?>