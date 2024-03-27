<?php

include_once "db.php";

$row=$Movie->find($_POST['id']);
$row['sh']=($row['sh']==1)?0:1; //判斷式 
$row['sh']=($row['sh']+1)%2; //運算式 效率會比判斷式好 如果是順序切換(1vs0切換)可使用餘數來取
// ex.(0+1)/2=餘數1 (1+1)/2=餘數0
$Movie->save($row);



?>