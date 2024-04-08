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
        box-sizing: border-box; /*設定border-box不被padding影響大小*/
        padding: 19px 112px 0 112px; /*使用padding排除不要區域 只畫在排除後的區域*/
        /*確認圖片stage高度大概19px排除此部分/及左右空白排除*/
    }
    .seat{
        width: 63px;
        height: 85px;
        /*background: rgba(200,200,100,0.5);*/ /*確認.seat範圍使用 測試*/
        position: relative; /*用於checkbox相對定位使用*/
    }
    .seats{
        display: flex;
        flex-wrap: wrap;
    }
    .chk{
        position: absolute;
        right: 1px;
        bottom: 1px;
    }
</style>
<!-- 因為使用ajax方式先向後端取得相關場次訂票數等資訊後->才會進行前端資料取得打出＋畫面顯示-->
<!-- 所以將此部分(整個訂票選位頁面)html,css在後端進行 -->

<div id="room">
    <div class="seats">
        <?php
        for($i=0;$i<20;$i++){
            echo "<div class='seat'>";
            echo "<div class='ct'>";
            echo (floor($i/5)+1) . "排"; //使用除法無條件捨去後+1
            echo (($i%5)+1) . "號"; //使用餘數+1
            echo "</div>";
            echo "<div class='ct'>";
            echo "<img src='./icon/03D02.png'>";
            echo "</div>";
            echo "<input type='checkbox' name='chk' value='$i' class='chk'>";
            echo "</div>";
        }
        ?>
    </div>
</div>
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