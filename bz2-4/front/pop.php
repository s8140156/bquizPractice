<fieldset>
    <legend>目前位置：首頁 > 人氣文章區</legend>
    <table style="width:90%;margin:auto">
        <tr>
            <th width="30%">標題</th>
            <th width="50%">內容</th>
            <th width="20%">人氣</th>
        </tr>
        <?php
        $total=$News->count(['sh'=>1]);
        $div=5;
        $pages=ceil($total/$div);
        $now=$_GET['p']??1;
        $start=($now-1)*$div;
        $rows=$News->all(['sh'=>1]," order by `good` desc limit $start,$div");
        foreach($rows as $row){
        ?>
        <tr>
            <td class="title clo" data-id="<?=$row['id'];?>"><?=$row['title'];?></td>
            <td>
                <div style="position:relative"><?=mb_substr($row['news'],0,20);?>...</div> 
                <div id="p<?=$row['id'];?>" class="pop">
                    <h3 style="color:lightblue"><?=$row['title'];?></h3>
                    <pre> <?=$row['news'];?></pre>
               </div>
            </td>
            <td>
            <span><?=$row['good'];?></span>個人說<img src="./icon/02B03.jpg" style="width:25px">
                <?php
                if(isset($_SESSION['user'])){
                    if($Log->count(['news'=>$row['id'],'acc'=>$_SESSION['user']])>0){
                        echo "<a href='Javascript:good({$row['id']})'>收回讚</a>";
                    }else{
                        echo "<a href='Javascript:good({$row['id']})'>讚</a>";

                    }
                }
                ?>

            </td>
        </tr>
        <?php    }
        ?>
    </table>
    <div class="ct">
        <?php
        if($now-1>0){
            $prev=$now-1;
            echo "<a href='index.php?do=pop&p=$prev'> < </a>";
        }
        for($i=1;$i<=$pages;$i++){
            $size=($now==$i)?'font-size:22px':'font-size:16px';
            echo "<a href='index.php?do=pop&p=$i' style='$size'> $i </a>";
        }
        if($now+1<=$pages){
            $next=$now+1;
            echo "<a href='index.php?do=pop&p=$next' style='$size'> > </a>";
        }
        ?>
    </div>
</fieldset>
<script>
    $('.title').hover(function(){
        $('.pop').hide()
        let id=$(this).data('id')
        $('#p'+id).show()
    })

</script>