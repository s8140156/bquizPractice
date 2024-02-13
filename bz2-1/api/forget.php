<?php

include_once "db.php";

// $user=$User->find(['email'=>$_POST['email']]);
$user=$User->find($_POST); //可以這樣簡寫 雖然從前端只傳email參數 但資料表是撈該筆全部欄位

if(empty($user)){
	echo "查無資料";
}else{
	echo "您的密碼:" .$user['pw'];
}


?>