<?php
include_once "db.php";

$res=$User->count($_POST); //這邊傳過來的是acc+pw 要一致才可以count

if($res){
    $_SESSION['user']=$_POST['acc']; //帳密正確 建立session

}

echo $res;


?>