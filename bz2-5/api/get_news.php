<?php

include_once "db.php";

$rows=$News->find($_GET);
echo nl2br($rows['news']);

?>