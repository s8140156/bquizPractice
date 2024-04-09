<h3 class="ct">訂單清單</h3>
<div class="qdel">
    快速刪除：
    <input type="radio" name="type" value="1">依日期
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