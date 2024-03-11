<?php

include_once "db.php";

$res=$User->find($_POST);
if(empty($res)){
    echo "查無此資料";
}else{
    echo "您的密碼為：".$res['pw'];
}



?>