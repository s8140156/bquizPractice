<?php

include_once "db.php";

$_SESSION['cart'][$_POST['id']]=$_POST['qt'];//應該是拿id當key qt為value
echo count($_SESSION['cart']);



?>