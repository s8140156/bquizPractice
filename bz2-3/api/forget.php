<?php
include_once "db.php";

$user=$User->find(['email'=>$_POST['email']]);

if(empty($user)){
    echo "查無此資料";
}else{
    echo "您的密碼為：".$user['pw'];
}

//我理解為 前端ajax只是傳值並傳"回來的結果"顯示在id=result 所以判斷要在後端完成 並echo各項判斷的回應


?>