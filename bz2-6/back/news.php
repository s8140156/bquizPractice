    <style>
        .ct >a{
            text-decoration: none;
        }
    </style>
    <form action="./api/edit_news.php" method="post">
        <table style="width:90%;margin:auto;text-align:center">
            <tr>
                <th>編號</th>
                <th>標題</th>
                <th>顯示</th>
                <th>刪除</th>
            </tr>
            <?php
            $total=$News->count();
            $div=3;
            $pages=ceil($total/$div);
            $now=$_GET['p']??1;
            $start=($now-1)*$div;
            $rows=$News->all(" limit $start,$div");
            foreach($rows as $idx=>$row){
            ?>
            <tr>
                <td class="clo" width="10%"><?=$idx+1+$start;?>.</td>
                <td width="60%"><?=$row['title'];?></td>
                <td><input type="checkbox" name="sh[]" value="<?=$row['id'];?>"<?=($row['sh']==1)?'checked':'';?>></td>
                <td><input type="checkbox" name="del[]" value="<?=$row['id'];?>">
                    <input type="hidden" name="id[]" value="<?=$row['id'];?>"></td>
            </tr>
            <?php       }
            ?>
        </table>
        <div class="ct">
        <?php
        if($now-1>0){
            $prev=$now-1;
            echo "<a href='?do=news&p=$prev'> < </a>";
        }
        for($i=1;$i<=$pages;$i++){
            $size=($now==$i)?'font-size:22px':'font-size:16px';
            echo "<a href='?do=news&p=$i' style='$size'> $i </a>";
        }
        if($now+1<=$pages){
            $next=$now+1;
            echo "<a href='?do=news&p=$next'> > </a>";
        }
        ?>
        </div>
        <div class="ct">
            <input type="submit" value="確定修改">
        </div>
    </form>