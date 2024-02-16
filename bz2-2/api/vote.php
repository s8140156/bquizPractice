<?php

include_once "db.php";

// $_POST['opt']; //送過來的是選項的該id 

$opt=$Que->find($_POST['opt']); //所以要反查資料庫 先取整筆與該選項資料(含subject_id)
$opt['vote']++;
$Que->save($opt);

$sub=$Que->find($opt['subject_id']);
$sub['vote']++;
$Que->save($sub);

to("../index.php?do=result&id={$sub['id']}");


?>