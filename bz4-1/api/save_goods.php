<?php

include_once "db.php";

//先判斷是否有圖片上傳
//因為這是新增/編輯共用 接下來判斷是否有id (以沒有id值(新增)先執行, 而後編輯就只是存$_POST來的資料)

if(!empty($_FILES['img']['tmp_name'])){
	$_POST['img']=$_FILES['img']['name'];
	move_uploaded_file($_FILES['img']['tmp_name'],"../img/".$_FILES['img']['name']);
}
if(!isset($_POST['id'])){
	$_POST['no']=rand(100000,999999);
	$_POST['sh']=1;
}
$Goods->save($_POST);

to("../back.php?do=th");




?>