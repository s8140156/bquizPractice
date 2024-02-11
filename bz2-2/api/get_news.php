<?php

include_once "db.php";

$news=$News->find($_GET);
echo nl2br($news['news']);



?>