<div class="di" style="height:540px; border:#999 1px solid; width:53.2%; margin:2px 0px 0px 0px; float:left; position:relative; left:20px;">
<?php include "marquee.php"; ?>
    <div style="height:32px; display:block;"></div>
    <!--正中央-->

    <!-- 這邊是動畫區 -->
    <div style="width:100%; padding:2px; height:290px;">
        <div id="mwww" loop="true" style="width:100%; height:100%;">
            <div style="width:99%; height:100%; position:relative;" class="cent">沒有資料</div>
        </div>
    </div>
    <!-- 這邊是動畫區 -->
    <!-- 不要忘記把script搬下來 然後動畫區的php寫在script裡面 注意!! -->
    <script>
        var lin = new Array();
        <?php
        $lins=$Mvim->all(['sh'=>1]);
        foreach($lins as $lin){
            echo "lin.push('{$lin['img']}');"; //請非常注意各種符號寫法
        }
        ?>
        var now = 0;
        ww(); //這邊要執行一次 不然會三秒後才有第一張
        if (lin.length > 1) {
            setInterval("ww()", 3000);
            now = 1;
        }

        function ww() { //注意!!!! 要加入img路徑拉(路徑格式請寫對)~~~~ ./img/ 要寫在 '   "這兩個中間
            $("#mwww").html("<embed loop=true src='./img/" + lin[now] + "' style='width:99%; height:100%;'></embed>")
            //$("#mwww").attr("src",lin[now])
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
        $rows=$News->all(['sh'=>1]," limit 5");
        foreach($rows as $row){
            echo "<li>";
            echo mb_substr($row['text'],0,20);
            echo "<div class='all' style='display:none'>";
            echo $row['text'];
            echo "</div>";
            echo "...</li>";
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