<fieldset>
    <legend>最新文章管理</legend>
<button onclick="location.href='?do=add_news'">新增文章</button>
<form action="./api/edit_news.php" method="post">
    <table style="width:90%;margin:auto;text-align:center">
        <tr>
            <td width="10%">編號</td>
            <td width="70%">標題</td>
            <td width="10%">顯示</td>
            <td width="10%">刪除</td>
        </tr>
        <?php
        $total=$News->count();
        $div=3;
        $pages=ceil($total/$div);
        $now=$_GET['p']??1;
        $start=($now-1)*$div;
        $news=$News->all(" limit $start,$div");
        foreach($news as $idx=>$n){
        ?>
        <tr>
            <td class="clo"><?=$idx+1+$start;?></td>
            <td><?=$n['title'];?></td>
            <td><input type="checkbox" name="sh[]" value="<?=$n['id'];?>"<?=($n['sh']==1)?'checked':'';?>></td>
            <td>
                <input type="checkbox" name="del[]" value="<?=$n['id'];?>">
                <input type="hidden" name="id[]" value="<?=$n['id'];?>">
            </td>
            <!-- <td></td> -->
        </tr>
        <?php  }
        ?>
    </table>
    <div class="ct">
        <?php
        if($now-1>0){
            $prev=$now-1;
            echo "<a href='back.php?do=news&p=$prev'> < </a>";
        }
        for($i=1;$i<=$pages;$i++){
            $size=($now==$i)?'font-size:22px':'font-size:16px';
            echo "<a href='back.php?do=news&p=$i' style='$size'> $i </a>";

        }
        if($now+1<=$pages){
            $next=$now+1;
            echo "<a href='back.php?do=news&p=$next'> > </a>";
        }
        ?>
    </div>
    <div class="ct">
        <input type="submit" value="確定修改">
    </div>
</form>
</fieldset>