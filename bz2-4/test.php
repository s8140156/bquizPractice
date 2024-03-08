<?php

include_once "./api/db2.php";

// $Beta->save(['total'=>'要成功啊','sh'=>1]);
// $Beta->save(['id'=>5,'total'=>'不準失敗','sh'=>0]);

// $rows=$Beta->all();
// $rows=$Beta->find(6);
// dd($rows);
$row=$Beta->sum('sh');
echo $row;

$Beta->del(6);


?>