<?php

include_once "db.php";

//因為mem資料表裡面有regdate欄位 所以記得先增加欄位資料後 再$_POST一起存進資料庫

$_POST['regdate']=date("Y-m-d");
$Mem->save($_POST);



?>