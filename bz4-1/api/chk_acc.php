<?php

include_once "db.php";

echo $Mem->count(['acc'=>$_GET['acc']]); //傳來的是GET 不是POST會造成無法讀取來的資料所以不會去資料庫 只會判斷前面admin的條件喔

?>