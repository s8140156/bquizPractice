<?php

include_once "db.php";

$movie=$_GET['movie'];
$date=$_GET['date'];
$H=date("G"); //算一天多少小時 使用G(不補零的24小時格式 計算可使用)
// $start=($H<14)?1:6-(ceil((24-$H)/2)-1); //計算開始場次的邏輯
$start=($H>=14 && $date==date("Y-m-d"))?6-(ceil((24-$H)/2)-1):1;
//增加是否當日的判斷,注意寫法>=(不是只有>);是否等於當天是(是判斷==,不是只有=) 如果不將比較運算子寫清楚 表單不會變動喔

for($i=$start;$i<=5;$i++){
    echo "<option value='{$sess[$i]}'>{$sess[$i]} 剩餘座位 20</option>";
    // echo "<option value='$i'>$i</option>"; //兩種寫法都可以
}

// $i=1      $i<=5
// $start=1  5  (1+5)=6
// $start=2  4  (2+4)=6
// $start=3  3  (3+3)=6
// $start=4  2  (4+2)=6
// $start=5  1  (5+1)=6




?>