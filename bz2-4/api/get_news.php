<?php

include_once "db.php";

$rows=$News->find($_GET['id']);
echo nl2br($rows['news']);


?>