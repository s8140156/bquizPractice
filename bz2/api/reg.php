<?php
include_once "db.php";

unset($_POST['pw2']); //資料表user沒建這個欄位 只有在前端檢查

$User->save($_POST);


?>