<?php
$row=$Que->find($_GET['id']); //天阿天阿天阿天阿 是get過來的!!!!!
?>
<fieldset>
    <legend>目前位置：首頁 > 問卷調查 > <?=$row['text'];?></legend>
    <h3><?=$row['text'];?></h3>
        <?php
        $opts=$Que->all(['subject_id'=>$_GET['id']]);
        foreach($opts as $opt){
            $total=($row['vote']!=0)?$row['vote']:1;
            $rate=round($opt['vote']/$total,2);
            echo "<div style='display:flex'>";
            echo "<div style='width:50%'>{$opt['text']}</div>";
            echo "<div style='width:".(40*$rate)."%;height:20px;background-color:#ccc'></div>";
            echo "<div style='width:10%'>{$opt['vote']}票(".($rate*100)."%)</div>";
            echo "</div>";
        }

        ?>
        <div class="ct"><button onclick="location.href='?do=que'">返回</button></div>
</fieldset>