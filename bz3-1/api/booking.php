<?php

include_once "db.php";

// $movie_id=$_GET['movie_id'];
$movie=$Movie->find($_GET['movie_id']);
$date=$_GET['date'];
$session=$_GET['session'];

//以下是進行確認該電影該日期該場次在資料表已選位狀況
//先從資料表裡找出對應的資訊
$ords=$Order->all(['movie'=>$movie['name'],
                   'date'=>$date,
                   'session'=>$session]);
$seats=[]; //先宣告空陣列
foreach($ords as $ord){
    $tmp=unserialize($ord['seats']); //先將每一筆'seats' unserialize
    $seats=array_merge($seats,$tmp); 
    //array_merge是將多筆陣列合併為一個陣列,只要在這個陣列裡確認即可(1次)就不用再寫巢狀迴圈(原迴圈次數*確認每訂單座位)增加確認降低效能
    //測試過 雖然裡面參數可以顛倒放,$tmp,$seats=>順序會是"最後一次購買"的順序最先(index0)
    // $seats,$tmp=>順序為"第一次購買"的順序最先(index0)
}
// dd($seats);

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
            if(in_array($i,$seats)){ //如果$i在$seats裡(表示已經選位了)
                echo "<img src='./icon/03D03.png'>";
            }else{
                echo "<img src='./icon/03D02.png'>";
            }
            echo "</div>";
            if(!in_array($i,$seats)){
                echo "<input type='checkbox' name='chk' value='$i' class='chk'>";
            }
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
            <button onclick="checkout()">訂購</button>
        </div>
    </div>
    <script>
        let seats=new Array(); //宣告一個變數空陣列(全域陣列)來存放點選後的資料,這樣寫直接是個物件 帶有方法(?)
        $('.chk').on('change',function(){
            if($(this).prop('checked')){
                if(seats.length+1<=4){
                    seats.push($(this).val()) //若確認property是checked的 就勾選起來
                }else{
                    $(this).prop('checked',false) //prop()函式不只可設一個參數 因為先判斷在有checked狀態下 所以如果不是 要改變checked狀態
                    alert('每個人只能勾選四張票')
                }
            }else{
                // console.log(seats.indexOf($(this).val())) //在測試看刪除哪個索引位置
                seats.splice(seats.indexOf($(this).val()),1)
                //陣列.splice(索引,要刪多少個,要取代的值(有才放))
                //陣列.indexOf(這邊就是放點選的那個值的那個位置)
            }
            // console.log($(this).prop('checked'),seats)
            // console.log(seats.length)
            $('#tickets').text(seats.length)
        })
        function checkout(){
            $.post('./api/checkout.php',{movie:'<?=$movie['name'];?>',
                                         date:'<?=$date;?>',
                                         session:'<?=$session;?>',
                                         qt:seats.length,
                                         seats},(no)=>{
                // 這邊php給出的資料需要加上' '讓裡面的值變成字串 不然js會判別為變數而傳不進後端
                location.href=`?do=result&no=${no}`;

            })
        }


    </script>