<?php

include_once "db.php";

$rows=$News->find($_POST['news']);
if($Log->count(['news'=>$_POST['news'],'acc'=>$_SESSION['user']])>0){
    $Log->del(['news'=>$_POST['news'],'acc'=>$_SESSION['user']]);
    $rows['good']--;
}else{
    $Log->save(['news'=>$_POST['news'],'acc'=>$_SESSION['user']]);
    $rows['good']++;
}
$News->save($rows);



?>