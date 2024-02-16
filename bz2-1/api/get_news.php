<?php

include_once "db.php";

$news=$News->find($_GET);
echo nl2br($news['text']); //這次資料庫欄位是設定'text' 先前老師欄位名稱：news

?>