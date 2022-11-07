<?php
function getPostVal($name){
    return $_POST[$name]?? "";
}

function validateEmail($name){
    if (!filter_input(INPUT_POST, $name, FILTER_VALIDATE_EMAIL)){
        return "Введите корректный email";
    }
}

function validateFilled($name){
    if (empty($_POST[$name])){
        return "Это поле должно быть заполнено";
    }
}
?>