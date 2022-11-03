<?php
function validateCategory(int $id, array $allowed_list){
    if(!in_array($id, $allowed_list)){
        return "Указана несуществующая категория";
    }
}
function validateImage(){
    if(!empty($_FILES['photo']['name'])){
        $finfo = finfo_open(FILEINFO_MIME_TYPE);
        $tmp_name = $_FILES['photo']['tmp_name'];
        $file_type = finfo_file($finfo,$tmp_name);
        if($file_type !== "image/jpeg" && $file_type !=="image/png" && $file_type !=="image/jpg"){
            return false;
        }
        return  true;
    } else{
        return  false;
    }
}
?>