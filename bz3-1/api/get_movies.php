<?php

include_once "db.php";

$today = date("Y-m-d");
$ondate = date("Y-m-d", strtotime("-2 days")); //時間戳(從今天開始算往前回推兩天的時間)
$rows = $Movie->all(" where `ondate`>='$ondate' && `ondate`<='$today' && `sh`=1 order by rank");
foreach($rows as $row){
    echo "<option value='{$row['id']}'>{$row['name']}</option>";
}




?>