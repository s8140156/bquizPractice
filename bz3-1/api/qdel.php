<?php

include_once "db.php";

// $Order->del(["{$_POST['type']}"=>$_POST['val']]);
$data[$_POST['type']]=$_POST['val']; //key是type value是val
$Order->del($data);
// $DB->del($_POST['id']);


?>