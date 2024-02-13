<?php

include_once "db.php";

$que=$Que->find($_GET['id']);
if($que['sh']==0){
	$que['sh']=1;
}else{
	$que['sh']=0;
}
// 這段是在說如果當傳過來的id['sh']為0時,就將 $que['sh']設為1(問卷原本是隱藏想要顯示 傳過來的狀態是0, 現在要改為1)
// 如果傳過來的id['sh']為1時,改為0 (問卷原本是顯示中想要隱藏 傳過來的狀態是1, 現在要改為0)

$Que->save($que);

to("../back.php?do=que");


?>