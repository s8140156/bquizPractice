<?php

include_once "db.php";

// $_GET['id']

$news=$News->find($_GET['id']);
echo nl2br($news['news']);






?>