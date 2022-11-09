<?php
require_once ('core/init.php');

/**
 * @var PDO $con
 * @var Array $categories
 * @var bool $isAuth
 */

$searchText=filter_input(INPUT_GET, 'search',FILTER_SANITIZE_STRING);

$stmt = $con->prepare('SELECT p.id,
                                 p.title,
                                 p.img,
                                 c.title AS category
                                 FROM posts p 
                                 JOIN categories c ON p.category_id = c.id
                                 WHERE MATCH(p.title, description) AGAINST(:searchText)'
);

$stmt->execute(['searchText' => $searchText]);

$searchPosts=$stmt->fetchAll();

$searchContent=include_template('index-template.php',[
    'isAuth'=>$isAuth,
    'categories'=>$categories,
    'posts'=>$searchPosts
]);

$page=include_template('layout.php',[
    'isAuth'=>$isAuth,
    'content'=>$searchContent
]);
print($page);
?>