<?php
$row=$Que->find($_GET['id']); //天阿天阿天阿天阿 是get過來的!!!!!
?>
<fieldset>
    <legend>目前位置：首頁 > 問卷調查 > <?=$row['text'];?></legend>
    <h3><?=$row['text'];?></h3>
    <form action="./api/vote.php" method="post">
        <?php
        $opts=$Que->all(['subject_id'=>$_GET['id']]);
        foreach($opts as $opt){
            echo "<div>";
            echo "<input type='radio' name='opt' value='{$opt['id']}'>";
            echo $opt['text'];
            echo "</div>";
        }

        ?>
        <div class="ct"><input type="submit" value="我要投票"></div>
    </form>
</fieldset>