<div class="half" style="vertical-align:top;">
  <h1>預告片介紹</h1>
  <div class="rb tab" style="width:95%;">
    <div id="abgne-block-20111227">
      <ul class="lists">
      </ul>
      <ul class="controls">
      </ul>
    </div>
  </div>
</div>
<style>
  .movies{
    display: flex;
    flex-wrap: wrap;
  }
  .movie{
    display: flex;
    flex-wrap: wrap;
    box-sizing: border-box;
    padding: 2px;
    margin: 0.5%;
    border: 1px solid #ccc;
    border-radius: 5px;
    width: 49%;
  }
  .ct >a{
    text-decoration: none;
  }
</style>
<div class="half">
  <h1>院線片清單</h1>
  <div class="rb tab" style="width:95%;">
    <div class="movies">
      <?php
      $today=date("Y-m-d");
      $ondate=date("Y-m-d",strtotime("-2 days")); //時間戳(從今天開始算往前回推兩天的時間)
      $total=$Movie->count(" where `ondate`>='$ondate' && `ondate`<='$today' && `sh`=1");
      $div=4;
      $pages=ceil($total/$div);
      $now=$_GET['p']??1;
      $start=($now-1)*$div;
      $rows=$Movie->all(" where `ondate`>='$ondate' && `ondate`<='$today' && `sh`=1 order by rank limit $start,$div");
      //需符合題意要自己寫sql語法：只顯示四筆,還有符合上映日期含開始三天結束的影片可以顯示
      foreach($rows as $idx=>$row){
      ?>
      <div class="movie">
        <div style="width:35%">
          <a href="?do=intro&id=<?=$row['id'];?>">
            <img src="./img/<?=$row['poster'];?>" style="width:60px;border:3px solid white">
          </a>
        </div>
        <div style="width:65%">
          <div><?=$row['name'];?></div>
          <div style="font-size:13px">分級：<img src="./icon/03C0<?=$row['level'];?>.png" style="width:20px"></div>
          <div style="font-size:13px">上映日期：<?=$row['ondate'];?></div>
        </div>
        <div style="width:100%">
          <button onclick="location.href='?do=intro&id=<?=$row['id'];?>'">劇情介紹</button>
          <button onclick="location.href='?do=order&id=<?=$row['id'];?>'">線上訂票</button>
        </div>
      </div>
      <?php } ?>
    </div>
    <div class="ct">
    <?php
            if ($now - 1 > 0) {
                $prev = $now - 1;
                echo "<a href='?p=$prev'> < </a>";
            }
            for ($i = 1; $i <= $pages; $i++) {
                echo "<a href='?p=$i'> $i </a>";
            }
            if ($now + 1 <= $pages) {
                $next = $now + 1;
                echo "<a href='?p=$next'> > </a>";
            }
            ?>
    </div>
  </div>
</div>