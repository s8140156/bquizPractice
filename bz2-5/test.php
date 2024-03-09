<?php

include_once "./api/db.php";

// $Beta->save(['total'=>'要寫進去','sh'=>1]);
// $Beta->save(['id'=>4,'total'=>'變來變去','sh'=>0]);
// $row=$Beta->find(7);
$row=$Beta->all();
dd($row);

$row=$Beta->count('sh');
echo $row;

$row=$Beta->sum('sh');
echo $row;

$Beta->del(7);

?>