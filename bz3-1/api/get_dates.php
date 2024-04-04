<?php

include_once "db.php"; 

$row=$_GET['id'];
$ondate=$Movie->find($row)['ondate'];
$today=date("Y-m-d");
for($i=0;$i<3;$i++){
    $date=strtotime("+$i days",strtotime($ondate)); //這次練習找到少寫"days"造成時間跑不出來
    if($date>=strtotime($today)){
        $str=date("Y-m-d",$date);
        echo "<option value='{$str}'>$str</option>";
    }
}






?>





