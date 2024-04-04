<?php

include_once "db.php"; 

// $row=$_GET['id'];
// $ondate=$Movie->find($row)['ondate'];
// $today=date("Y-m-d");
// for($i=0;$i<3;$i++){
//     $date=strtotime("+$i days",strtotime($ondate)); //這次練習找到少寫"days"造成時間跑不出來
//     if($date>=strtotime($today)){
//         $str=date("Y-m-d",$date);
//         echo "<option value='{$str}'>$str</option>";
//     }
// }
//以上是第一種解法 較直覺 但有點巢狀會影響效能

// 第二種是以差異日(以結束日)來計算 也就不用迴圈跑三次後再判斷
$row=$_GET['id'];
// $ondate=$Movie->find($row)['ondate'];
// $end=strtotime("+2 days", strtotime($ondate)); //先算出上映日期的最終上映日的時間
// $today=date("Y-m-d");
// $diff=($end-strtotime($today))/(60*60*24); //計算與今日的差異時間後轉換成差距天數(結束日期距離今天有幾天)
$ondate=strtotime($Movie->find($row)['ondate']);
$end=strtotime("+2 days",$ondate); //先算出上映日期的最終上映日的時間
$today=strtotime(date("Y-m-d"));
$diff=($end-$today)/(60*60*24); //計算與今日的差異時間後轉換成差距天數(結束日期距離今天有幾天)
// echo $diff; //除錯時確認$diff出來的數據是什麼 因為是結束日與今天比對 所以會是正數
for($i=0;$i<=$diff;$i++){
// for($i=(2-$diff);$i<3;$i++){ //第三種：這邊示範將差異天數by開始日算
    // $date=date("Y-m-d",strtotime("+$i days",strtotime($ondate)));
    $date=date("Y-m-d",strtotime("+$i days")); //從今天開始算還可以上映幾天(加上差異天數)
    echo "<option value='{$date}'>$date</option>";
}







?>





