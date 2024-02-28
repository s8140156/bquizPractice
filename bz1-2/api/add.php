<?php

include_once "db.php";

$table=$_POST['table'];
$DB=${ucfirst($table)};

switch($table){
    case 'admin':
        unset($_POST['pw2']);
    break;
    case 'menu': //這是因為mac不接受空值 空值會造成寫入問題
        $_POST['menu_id']=0;
    break;
}
if(!empty($_FILES['img']['tmp_name'])){
    move_uploaded_file($_FILES['img']['tmp_name'],"../img/".$_FILES['img']['name']);
    $_POST['img']=$_FILES['img']['name'];

}
if($table!='admin'){ //先排除admin因為沒有sh欄位 其他都有
    $_POST['sh']=($table=='title')?0:1; //只有title_radio 所以先設0 其他多選 預設1
}

unset($_POST['table']);
$DB->save($_POST);

to("../back.php?do=$table");


?>