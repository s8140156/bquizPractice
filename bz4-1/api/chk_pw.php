<?php

include_once "db.php";

$table=$_POST['table'];
unset($_POST['table']);
$db=new DB($table);

$chk=$db->count($_POST);
if($chk){ //如果是簡單if判斷 會先是true=1的執行
    echo $chk;
    $_SESSION[$table]=$_POST['acc'];
}else{
    echo $chk;
}


?>