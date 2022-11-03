<?php

require_once ('core/init.php');

/**
 * @var PDO $con
 * @var Array $categories
 * @var bool $isAuth
 */

$errors = [];
$cats_ids = array_column($categories, 'id');
$post = $_POST;
$rules = [
    'category_id'=>function($value) use ($cats_ids){
        return validateCategory($value,$cats_ids);
    },
    'title'=>function(){
        return validateFilled('title');
    },
    'description'=>function(){
        return validateFilled('description');
    }
];

$file_rule=function (){
    if(!validateImage()){
        return "Загрузите картинку в формате jpg, jpeg или png";
    }
};

if($_SERVER['REQUEST_METHOD']=='POST'){
    foreach ($post as $key=>$value){
        if(isset($rules[$key])){
            $rule=$rules[$key];
            $errors[$key]=$rule($value);
        }
    }
    $errors['photo']=$file_rule();
}
$errors=array_filter($errors);

if ($isAuth===false){
    header('Location: login.php');
    exit;
}

if($_SERVER['REQUEST_METHOD']=='POST' && empty($errors) ){

    $file_name=$_FILES['photo']['name'];
    $uniq_url=uniqid();
    $post['img_url']='uploads/' . $uniq_url . $file_name;
    $post['user_id']=$_SESSION["user_id"];
    move_uploaded_file($_FILES['photo']['tmp_name'], $post['img_url']);

    $stmt=$con->prepare('INSERT INTO post SET title=:title, user_id=:id, category_id=:category_id, description=:description, img_url=:img_url');
    $stmt->execute($post);
    header("Location: single.php?id=" . $con->lastInsertId());
}

$addpostContent=include_template('pages/add-post-template.php',[
    'categories'=>$categories,
    'errors'=>$errors
]);
$page= include_template('layout.php',[
        'isAuth'=>$isAuth,
        'content'=>$addpostContent
]);
print ($page);
?>
