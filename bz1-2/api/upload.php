<?php

include_once "db.php";

$table=$_POST['table'];
$DB=${ucfirst($table)};

// $_POST['id'];

$row=$DB->find($_POST['id']);

if(isset($_FILES['img']['tmp_name'])){ //在新增時是判斷暫存區裡資料不是空的, 在編輯(更新圖片)是有沒有資料在暫存區
	move_uploaded_file($_FILES['img']['tmp_name'],"../img/".$_FILES['img']['name']); //麻煩注意存放路徑層級
	$row['img']=$_FILES['img']['name'];
}
$DB->save($row);

to("../back.php?do=$table");


?>