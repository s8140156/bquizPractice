<?php

include_once "db.php";

$DB=new DB($_POST['table']);
$row=$DB->find($_POST['id']); //這是點選要變換的id
$sw=$DB->find($_POST['sw']); //這是準備要被交換的id

$tmp=$row['rank'];
$row['rank']=$sw['rank'];
$sw['rank']=$tmp;

$DB->save($row);
$DB->save($sw);



?>