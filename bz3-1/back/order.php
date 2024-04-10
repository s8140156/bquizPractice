<h3 class="ct">訂單清單</h3>
<div class="qdel">
    快速刪除：
    <input type="radio" name="type" value="1" checked>依日期 <!--寫在裡面checked真的就是邱森萬-->
    <input type="text" name="date" id="date">
    <input type="radio" name="type" value="2">依電影
    <select name="movie" id="movie">
    <?php
    $movies=$Order->q("select `movie` from `orders` Group by `movie`");
    //若使用all()會把全部欄位篩出,這邊只要movie片名這個欄位即可使用q
    // group by可以利用群組後找出不重複的值
    foreach($movies as $movie){
        echo "<option value='{$movie['movie']}'>{$movie['movie']}</option>";
    }
    ?>
    </select> <!--所有order資料表裡面訂單的電影清單-->
    <button>刪除</button>

</div>
<style>
    .lists{
        overflow: auto;
        height: 330px;
        width: 100%;
    }
    .item{
        width: 100%;
        display: flex;
        align-items: center;
        justify-content: center;
    }
    .header{
        display: flex;
        justify-content: space-between;
    }
    .header div, .item div{
        width: calc(100% / 7);
    }
</style>
<div class="header">
    <div>訂單編號</div>
    <div>電影名稱</div>
    <div>日期</div>
    <div>場次時間</div>
    <div>訂購數量</div>
    <div>訂購位置</div>
    <div>操作</div>
</div>
<div class="lists">
    <?php
    $orders=$Order->all();
    foreach($orders as $ord){
    ?>
    <div class="item">
        <div><?=$ord['no'];?></div>
        <div><?=$ord['movie'];?></div>
        <div><?=$ord['date'];?></div>
        <div><?=$ord['session'];?></div>
        <div><?=$ord['qt'];?></div>
        <div>
            <?php
            $seats=unserialize($ord['seats']);
            foreach($seats as $seat){
                echo (floor($seat/5)+1) . "排";
                echo (($seat%5)+1) . "號";
                echo "<br>";
            }
            ?>
            </div>
        <div><button onclick="del(<?=$ord['id'];?>)">刪除</button></div>
        <!-- 共用back/movie api/del.php 所以要帶id去api-->
    </div>
    <?php } ?>
</div>
<script>
    function del(id){
        $.post('./api/del.php',{table:'orders',id},()=>{
            location.reload()
        })
    }
</script>