<fieldset>
    <legend>目前位置：首頁 > 最新文章區</legend>
    <table style="width:95%;margin:auto">
        <tr>
            <th style="width:30%">標題</th>
            <th style="width:50%">內容</th>
        </tr>
        <?php
        $total=$News->count(['sh'=>1]);
        $div=5;
        $pages=ceil($total/$div);
        $now=$_GET['p']??1; //一定要記得這邊要有簡單判斷如果找不到get值 直接到第一頁
        $start=($now-1)*$div;
        
        $rows=$News->all(['sh'=>1], " limit $start,$div");
        foreach($rows as $row){
        ?>
        <tr>
            <td><div class="title" data-id="<?=$row['id'];?>" style="cursor:pointer"><?=$row['title'];?></div></td>
            <td> <!--要有兩個div一個是一開始短版文章, 一個是文章全文(先display:none)-->
                <div id="s<?=$row['id'];?>"><?=mb_substr($row['text'],0,25);?>...</div>
                <div id="a<?=$row['id'];?>" style="display:none"><?=$row['text'];?></div>
            </td>
        </tr>
        <?php } ?>
    </table>
    <div>
        <?php
        if($now-1>0){
            $prev=$now-1;
            echo "<a href='?do=news&p=$prev'> < </a>";
        }
        for($i=1;$i<=$pages;$i++){
            $size=($now==$i)?'font-size:22px':'font-size:16px';
            echo "<a href='?do=news&p=$i' style='$size'> $i </a>";

        }
        if(($now+1)<=$pages){
            $next=$now+1;
            echo "<a href='?do=news&p=$next'> > </a>";
        }

        ?>
    </div>
</fieldset>
<script>
    $('.title').on('click',(e)=>{
        let id=$(e.target).data('id');
        $(`#s${id},#a${id}`).toggle();
    })

</script>