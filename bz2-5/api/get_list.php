<?php

include_once "db.php";

$rows=$News->all(['type'=>$_GET['type'],'sh'=>1]); // 1.find在找by id 2.all記得還是要把條件說清楚(看帶進來的是什麼)
foreach($rows as $row){
    echo "<a href='Javascript:getNews({$row['id']})' style='display:block'>";
    echo $row['title'];
    echo "</a>";
}




?>