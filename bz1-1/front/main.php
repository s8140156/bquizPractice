<div class="di" style="height:540px; border:#999 1px solid; width:53.2%; margin:2px 0px 0px 0px; float:left; position:relative; left:20px;">
<!-- marquee start -->
<?php include "marquee.php"; ?>
<!-- marquee end -->
    <div style="height:32px; display:block;"></div>
    <!--正中央-->
    <!-- 動畫script 搬去mwww下方 不然動畫區塊會吃不到script-->

    <!-- 動畫script 搬去mwww下方 不然動畫區塊會吃不到script -->
    <!-- 這塊是動畫區 -->
    <div style="width:100%; padding:2px; height:290px;">
        <div id="mwww" loop="true" style="width:100%; height:100%;">
            <div style="width:99%; height:100%; position:relative;" class="cent">沒有資料</div>
        </div>
    </div>
    <!-- 這塊是動畫區 -->
    <script>
        var lin = new Array();
        <?php
        $lins=$Mvim->all(['sh'=>1]);
        foreach($lins as $lin){
            echo "lin.push('{$lin['img']}');"; //發現js句子沒寫完整少了結尾;(,要寫在""裡面  不是php的結尾) 會導致接連push進來的圖片沒斷行 js無法判別斷行而不產生圖片(從console可以看到執行的結果)
        }
        ?>
        var now = 0;
        ww(); //重要:在宣告變數後 先執行一次function ww() 注意 寫在這裡!!
        if (lin.length > 1) {
            setInterval("ww()", 3000);
            now = 1;
        }

        function ww() {
            $("#mwww").html("<embed loop=true src='./img/" + lin[now] + "' style='width:99%; height:100%;'></embed>")
            //$("#mwww").attr("src",lin[now]) 注意:這邊要把圖片"路徑"./img/放入
            now++;
            if (now >= lin.length)
                now = 0;
        }
    </script>
    <div style="width:95%; padding:2px; height:190px; margin-top:10px; padding:5px 10px 5px 10px; border:#0C3 dashed 3px; position:relative;">
        <span class="t botli">最新消息區
        <?php
        if($News->count(['sh'=>1])>5){
            echo "<a href='?do=news' style='float:right'>More...</a>";
        }
        ?>
        </span>
        <ul class="ssaa" style="list-style-type:decimal;">
        <?php
        $news=$News->all(['sh'=>1],' limit 5');
        foreach($news as $n){
            echo "<li>";
            echo mb_substr($n['text'],0,20)."...";
            echo "<div class='all' style='display:none'>";
            echo $n['text'];
            echo "</div>";
            echo "</li>";
        }
        ?>
        </ul>
        <div id="altt" style="position: absolute; width: 350px; min-height: 100px; background-color: rgb(255, 255, 204); top: 50px; left: 130px; z-index: 99; display: none; padding: 5px; border: 3px double rgb(255, 153, 0); background-position: initial initial; background-repeat: initial initial;">
        </div>
        <script>
            $(".ssaa li").hover(
                function() {
                    $("#altt").html("<pre>" + $(this).children(".all").html() + "</pre>")
                    $("#altt").show()
                }
            )
            $(".ssaa li").mouseout(
                function() {
                    $("#altt").hide()
                }
            )
        </script>
    </div>
</div>