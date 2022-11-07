<?php

require_once('core/helpers.php');
require_once('core/init.php');

/**
 * @var PDO $con
 */


$postsObject=$con->query('SELECT p.id, p.title, p.img_url, c.title as category from posts p JOIN categories c on p.category_id = c.id' );
$posts = $postsObject->fetchAll();

$indexContent = include_template("index-template.php", [
    'isAuth'=>$isAuth,
    'categories'=>$categories,
    'posts'=>$posts
]);

$page = include_template("layout.php",[
    'isAuth'=>$isAuth,
    'content'=>$indexContent
]);
print ($page);
?>

