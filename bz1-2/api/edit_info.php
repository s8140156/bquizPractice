<?php

include_once "db.php";

$table=$_POST['table'];
$DB=${(ucfirst($table))};
$data=$DB->find(5);

$data[$table]=$_POST[$table];
$DB->save($data);

to("../back.php?do=$table");




?>