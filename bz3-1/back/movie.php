<button onclick="location.href='?do=add_movie'">新增電影</button>
<hr>
<style>
    .item div{
        box-sizing: border-box;
        color: black;
    }
    .item{
        width: 100%;
        display: flex;
        padding: 3px;
        box-sizing: border-box;
        background-color: white;
        margin: 3px 0;
    }
    .item>div:nth-child(1){
        width: 15%;
    }
    .item>div:nth-child(2){
        width: 12%;
    }
    .item>div:nth-child(3){
        width: 73%;
    }
</style>
<div style="width:100%;height:415px;overflow:auto">
<?php
$rows=$Movie->all(" order by rank");
foreach($rows as $idx=>$row){
?>
    <div class="item">
        <div>
            <img src="./img/<?=$row['poster'];?>" style="width:100%">
        </div>
        <div>
            分級：<img src="./icon/03C0<?=$row['level'];?>.png" style="width:25px">
        </div>
        <div>
            <div style="display:flex;width:100%">
                <div style="width:33.33%">
                片名：<?=$row['name'];?></div>
                <div style="width:33.33%">
                片長：<?=$row['length'];?></div>
                <div style="width:33.33%">
                上映時間：<?=$row['ondate'];?></div>
            </div>
            <div>
                <button class="show-btn" data-id="<?=$row['id'];?>"><?=($row['sh']==1)?'顯示':'隱藏';?></button>
                <!-- 這邊三元運算是判斷撈出來的sh狀態是什麼的顯示(一開始) 下面btn是點擊動作後的狀態顯示 -->
                <button class="sw-btn" data-id="<?=$row['id'];?>" data-sw="<?=($idx!==0)?$rows[$idx-1]['id']:$row['id'];?>">往上</button>
                <button class="sw-btn" data-id="<?=$row['id'];?>" data-sw="<?=(count($rows)-1!=$idx)?$rows[$idx+1]['id']:$row['id'];?>">往下</button>
                <button class="edit-btn" data-id="<?=$row['id'];?>">編輯電影</button>
                <button class="del-btn" data-id="<?=$row['id'];?>">刪除電影</button>
            </div>
            <div>
                劇情介紹：<?=$row['intro'];?>
            </div>
        </div>
    </div>
    <?php } ?> <!--這次練習因為foreach結尾放錯(括到最外層div) 造成每組電影欄位跑出框架-->
</div>
<script>
    $('.show-btn').on('click',function(){
        let id=$(this).data('id')
        $.post('./api/show.php',{id},()=>{
            $(this).text(($(this).text()=='顯示')?'隱藏':'顯示'); //三元運算 及switch寫法
            //注意jq的括弧是整個從.text "()裡面要全包" 包到整個運算判斷式完 但三元運算只有包到判斷式那邊
            // 這次因為jq括弧位置包錯 造成點選變更sh寫不進資料庫
            // switch($(this).text()){
            //     case "隱藏": //目前在隱藏狀態下,接下來的動作是
            //         $(this).text("顯示"); //接下來的動作就是點擊btn後把隱藏變成顯示
            //     break;
            //     case "顯示":
            //         $(this).text("隱藏");
            //     break;
            // }
        })
    })
    $('.sw-btn').on('click',function(){
        let id=$(this).data('id')
        let sw=$(this).data('sw')
        let table='movie' //院線片也會用到排序 所以設定table參數
        $.post('./api/sw.php',{id,sw,table},()=>{
            location.reload();
        })
    })
    $('.edit-btn').on('click',function(){
        let id=$(this).data('id')
        location.href=`?do=edit_movie&id=${id}`;
    })
    $('.del-btn').on('click',function(){
        let id=$(this).data('id')
        $.post('./api/del.php',{id,table:'movie'},()=>{
            location.reload()
        })
    })
</script>