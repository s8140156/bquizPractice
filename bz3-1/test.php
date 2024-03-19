<?php

include_once "./api/db.php";

// $Alto->save(['total'=>'請成功寫入','sh'=>1]);
// $Alto->save(['id'=>4,'total'=>'修改','sh'=>0]);

// $res=$Alto->all();
// $res=$Alto->find(3);
// dd($res);

$res=$Alto->count('sh');
$res=$Alto->sum('sh');
echo $res;

$Alto->del(2);



?>