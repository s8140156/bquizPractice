<?php

include_once "db.php";

// $movie_id=$_GET['movie_id'];
$movie=$Movie->find($_GET['movie_id']);
$date=$_GET['date'];
$session=$_GET['session'];

?>
<style>
    #room{
        background-image: url('./icon/03D04.png');
        background-position: center;
        background-repeat: no-repeat;
        width: 540px;
        height: 370px;
        margin: auto;
    }
</style>
<!-- 因為使用ajax方式先向後端取得相關場次訂票數等資訊後->才會進行前端資料取得打出＋畫面顯示-->
<!-- 所以將此部分(整個訂票選位頁面)html,css在後端進行 -->

<div id="room"></div>
    <div id="info">
        <div>您選擇的電影是：<?=$movie['name'];?></div>
        <div>您選擇的時刻是：<?=$date;?> <?=$session;?></div>
        <div>您已經勾選<span id="tickets">0</span>張票，最多可以購買四張票</div>
        <div>
            <button onclick="$('#select').show();$('#booking').hide()">上一步</button>
            <!--使用前端方式讓畫面其實都在同一頁(不用換頁也不需去資料庫拿資料) 可以符合題意保留點選後的選單的選項-->
            <!-- 在上一步/確定兩個button切換 -->
            <button conlick="">訂購</button>
        </div>
    </div>