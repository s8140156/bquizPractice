<?php

include_once "db.php";

$res=$Que->find($_GET['id']);
if($res['sh']==0){
    $res['sh']=1;
}else{
    $res['sh']=0;
}

$Que->save($res);

to("../back.php?do=que");

?>