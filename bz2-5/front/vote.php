<?php
$rows=$Que->find($_GET['id']);
?>
<fieldset>
    <legend>目前位置：首頁 > 問卷調查 > <?=$rows['text'];?> </legend>
    <h3><?=$rows['text'];?></h3>
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
        <div class="ct">
            <input type="submit" value="我要投票">
        </div>
    </form>
</fieldset>