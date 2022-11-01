<?php

require_once("core/helpers.php");

$isAuth = (bool) rand(0,1);

$registerContent=include_template('register-template.php');

$page =include_template('layout.php',[
    'isAuth'=>$isAuth,
    'content'=>$registerContent
]);
print ($page);
?>
