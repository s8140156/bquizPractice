<?php
include_once "db.php";

$res=$User->count(['acc'=>$_POST['acc']]);
if($res>0){
    echo 1;
}else{
    echo 0;
}

// echo $User->count(['acc'=>$_POST['acc']]); //簡化寫法

?>