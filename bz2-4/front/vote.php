<?php
$row=$Que->find($_GET['id']);
?>
<fieldset>
    <legend>目前位置：首頁 > 問卷調查 > <?=$row['text'];?> </legend>
    <form action="./api/vote.php" method="post">
        <h3><?=$row['text'];?></h3>
        <?php
        $opts=$Que->all(['subject_id'=>$_GET['id']]);
        foreach($opts as $opt){
            echo "<div>";
            echo "<input type='radio' name='opt' value='{$opt['id']}'>";
            echo $opt['text'];
            echo "</div>";
        }
        ?>
        <div class="ct">
            <input type="submit" value="我要投票">
        </div>
    </form>
</fieldset>