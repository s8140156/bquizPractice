<?php

include_once "./api/db.php";

// $Alto->save(['total'=>'成功輸入','sh'=>1]);
// $Alto->save(['id'=>3,'total'=>'再次輸入','sh'=>0]);

// $row=$Alto->all();
// $row=$Alto->find(2);
// dd($row);

$row=$Alto->count('total');
echo $row;

$row=$Alto->sum('sh');
echo $row;

$Alto->del(3);



?>