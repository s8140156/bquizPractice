<?php

//總共九張資料表 但bottom/total這兩張沒有新增功能
// add.php用在剩下的七張表(title/mvim/image/ad/news/memnu/admin)
// title/mvim/image=>有圖片上傳
// admin沒有sh欄位 其他都有; but只有title的sh先預設為0(因為是radio), 其他都預設1(checkbox)

include_once "db.php";

$table=$_POST['table'];
$DB=${ucfirst($_POST['table'])};

switch($table){
    case 'admin':
        unset($_POST['pw2']);
    break;
    case 'menu':
        $_POST['menu_id']=0;
    break;
}
if(isset($_FILES['img']['tmp_name'])){
    move_uploaded_file($_FILES['img']['tmp_name'],"../img/".$_FILES['img']['name']); //注意檔案夾的寫法 剛少了img/
    $_POST['img']=$_FILES['img']['name'];
}
if($table!='admin'){
    $_POST['sh']=($table=='title')?0:1;
}

unset($_POST['table']);
$DB->save($_POST);

to("../back.php?do=$table");




?>