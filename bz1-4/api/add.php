<?php

include_once "db.php";

$table=$_POST['table'];
$DB=${ucfirst($table)};
unset($_POST['table']);

switch($table){
    case "admin":
        unset($_POST['pw2']);
    break;
    case "menu":
        $_POST['menu_id']=0;
    break;
}
if(!empty($_FILES['img']['tmp_name'])){
    move_uploaded_file($_FILES['img']['tmp_name'],'../img/'.$_FILES['img']['name']);
    $_POST['img']=$_FILES['img']['name'];
}
if($table!=='admin'){
    $_POST['sh']=($table=='title')?0:1;
}

$DB->save($_POST);

to("../back.php?do=$table");

?>