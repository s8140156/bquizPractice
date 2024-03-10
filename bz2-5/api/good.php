<?php

include_once "db.php";

$rows=$News->find($_POST['news']);
if($Log->count(['news'=>$rows['id'],'acc'=>$_SESSION['user']])>0){
    $Log->del(['news'=>$rows['id'],'acc'=>$_SESSION['user']]);
    $rows['good']--;
}else{
    $Log->save(['news'=>$rows['id'],'acc'=>$_SESSION['user']]);
    $rows['good']++;

}
$News->save($rows);

?>