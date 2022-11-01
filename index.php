<?php

require_once('core/helpers.php');
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

