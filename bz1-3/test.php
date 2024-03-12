<?php

include_once "./api/db.php";

// $Beta->save(['total'=>'成功寫進去','sh'=>1]);
// $Beta->save(['id'=>2,'total'=>'變身','sh'=>0]);

// $res=$Beta->all();
$res=$Beta->find(3);
dd($res);

$res=$Beta->count('sh');
echo $res;

$res=$Beta->sum('sh');
echo $res;

$Beta->del(4);




?>