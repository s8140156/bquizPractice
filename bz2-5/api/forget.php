<?php

include_once "db.php";

$user=$User->find($_POST);
if(empty($user)){
    echo "查無資料";
}else{
    echo "您的密碼為：" .$user['pw'];
}



?>