<?php

include_once "db.php";

$DB=new DB($_POST['table']); //看起來這邊因為帶變數table所以 要重新new物件
$DB->del($_POST['id']);


?>