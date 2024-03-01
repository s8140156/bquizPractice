<?php

include_once "db.php";

$table=$_POST['table'];
$DB=${(ucfirst($table))};
$data=$DB->find(5); //這邊請注意 因為我使用db共用(題組一樣共用) 所以如果id有改 其他同樣題組這方面要一併改 不然會有顯示/寫入問題

$data[$table]=$_POST[$table];
$DB->save($data);

to("../back.php?do=$table");

?>