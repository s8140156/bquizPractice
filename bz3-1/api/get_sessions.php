<?php

include_once "db.php";

$movie=$_GET['movie'];
$date=$_GET['date'];
$H=date("G"); //算一天多少小時 使用G(不補零的24小時格式 計算可使用)
$start=($H<14)?1:6-(ceil((24-$H)/2)-1);

for($i=$start;$i<=5;$i++){
    echo "<option value='{$sess[$i]}'>{$sess[$i]} 剩餘座位 20</option>";
    // echo "<option value='$i'>$i</option>"; //兩種寫法都可以
}




?>