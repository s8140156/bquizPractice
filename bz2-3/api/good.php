<?php

include_once "db.php";

$news=$News->find($_POST['news_id']);
if($Log->count(['news'=>$_POST['news_id'],'acc'=>$_SESSION['user']])>0){
    $Log->del(['news'=>$_POST['news_id'],'acc'=>$_SESSION['user']]);
    $news['good']--;
}else{
    $Log->save(['news'=>$_POST['news_id'],'acc'=>$_SESSION['user']]);
    $news['good']++;
}

$News->save($news);


?>