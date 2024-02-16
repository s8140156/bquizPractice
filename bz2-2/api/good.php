<?php

include_once "db.php";

// $_POST['news'];
// $_SESSION['user'];

$news=$News->find($_POST['news']);
if($Log->count(['news'=>$_POST['news'],'acc'=>$_SESSION['user']])>0){
	//收回讚
	$Log->del(['news'=>$_POST['news'],'acc'=>$_SESSION['user']]);
	$news['good']--;

}else{
	//增加讚
	$Log->save(['news'=>$_POST['news'],'acc'=>$_SESSION['user']]);
	$news['good']++;
}

//這種
// $news['good']+=1;
// $news['good']=$news['good']+1;
$News->save($news);

?>