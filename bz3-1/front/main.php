<style>
  .lists{
    width:200px;
    height: 240px;
    position: relative;
    left: 114px; /*如果不左移 item原先定位會是預設左上對齊((428-200)/2)並剩下空間要/2才會置中對齊*/
    overflow: hidden;
  }
  .item *{
    box-sizing: border-box; /*不被padding影響*/
  }
  .item{ /*主預告片區域 先做隱藏應該點選下面預告片時change, item底下帶圖跟字*/
    width:200px;
    height: 240px;
    position: absolute;
    box-sizing: border-box;
    display: none; /*先全部隱藏 然後使用jq eq找idx0(第一個)要show*/
    /* 除了eq方式也可以像第二題先設active(搭配格式display:block) 然後在用點擊方式遇active才show(remove/addClass) */
  }
  .item div img{ /*圖的設定*/
    width: 100%; /*注意 要將div裡面的圖片設定寬度 因上層item已有固定寬度 所以底下的圖片會是100%*/
    height: 220px; /*圖片區的高度縮小點 才可以讓文字顯現*/
  }
  .item div{ /*字的設定*/
    text-align: center;
  }
  .left,.right{ /*使用css畫三角形(幾何圖形)做左右鍵按鈕*/
    width: 0; /*只留線的寬度(20px)(只剩左右兩邊的三角形) 沒有內容(把下面的內容拿掉)*/
    border: 20px solid black; /*設定後長相會是左右兩邊各有一個尖角向內的三角形*/
    border-top-color: transparent; /*中間的內容(上)設定透明*/
    border-bottom-color: transparent; /*中間的內容(下)設定透明*/
  }
  .left{
    border-left-width: 0; /*所以要留下尖角向左邊的三角形(線的寬度) 所以拿掉left-width*/
  }
  .right{
    border-right-width: 0; /*所以要留下尖角向右邊的三角形(線的寬度) 所以拿掉right-width*/
  }
  .btns{
    width: 360px;
    height: 100px;
    display: flex; /*這邊是在設定裡面小預告片橫列*/
    overflow: hidden;
  }
  .btn img{ /*這是設定小預告片圖片尺寸*/
    width: 60px;
    height: 80px;
  }
  .btn{
    font-size: 12px;
    text-align: center;
    flex-shrink: 0; /*(設0)保持原本的寬度(設1-自動縮放)*/
    width: 90px;  /*(360/4)這邊是算預計要放4個預告片所以每個寬度是90px*/
    /* 理解是因為已把圖片寬度設定比原本框架小60<90 所以當最上層設定為flex時 看display會全部並排在一起(沒有間隔) */
    /* 所以再使用flex-shrink應該是圖＋空白=btn的尺寸 造成有間隔 也便於計算移動動畫時的往左往右距離(等距) */
    position: relative;
  }
  .controls{ /*設定最上層框架*/
    width: 420px;
    height: 100px;
    position: relative;
    margin-top: 10px;
    display: flex; /*這邊是把兩邊按鈕＋中間內容橫列*/
    align-items: center;
    justify-content: space-around;
  }


</style>
<div class="half" style="vertical-align:top;">
  <h1>預告片介紹</h1>
  <div class="rb tab" style="width:95%;">
    <div class="lists">
      <?php
      $posters=$Poster->all(['sh'=>1], " order by rank"); 
      //這次練習 因為db sql_all在接array時 忘記將字串"where"放入 造成預告片有syntax問題(array無法成功拉出)
      foreach($posters as $idx=>$poster){
      ?>
      <div class="item" data-ani="<?=$poster['ani'];?>">
        <div><img src="./img/<?=$poster['img'];?>" alt=""></div>
        <div><?=$poster['name'];?></div>
      </div>
      <?php } ?>
    </div>
    <div class="controls">
      <div class="left"></div>
      <div class="btns">
        <?php
        foreach($posters as $idx=>$poster){
        ?>
        <div class="btn">
          <img src="./img/<?=$poster['img'];?>" alt="">
          <div><?=$poster['name'];?></div>
        </div>
        <?php } ?>
      </div>
      <div class="right"></div>
    </div>
  </div>
</div>
<script>
  $('.item').eq(0).show() //eq選擇位置(索引值)在哪

</script>
<style>
  .movies {
    display: flex;
    flex-wrap: wrap;
  }

  .movie {
    display: flex;
    flex-wrap: wrap;
    box-sizing: border-box;
    padding: 2px;
    margin: 0.5%;
    border: 1px solid #ccc;
    border-radius: 5px;
    width: 49%;
  }

  .ct>a {
    text-decoration: none;
  }
</style>
<div class="half">
  <h1>院線片清單</h1>
  <div class="rb tab" style="width:95%;">
    <div class="movies">
      <?php
      $today = date("Y-m-d");
      $ondate = date("Y-m-d", strtotime("-2 days")); //時間戳(從今天開始算往前回推兩天的時間)
      $total = $Movie->count(" where `ondate`>='$ondate' && `ondate`<='$today' && `sh`=1");
      $div = 4;
      $pages = ceil($total / $div);
      $now = $_GET['p'] ?? 1;
      $start = ($now - 1) * $div;
      $rows = $Movie->all(" where `ondate`>='$ondate' && `ondate`<='$today' && `sh`=1 order by rank limit $start,$div");
      //需符合題意要自己寫sql語法：只顯示四筆,還有符合上映日期含開始三天結束的影片可以顯示
      foreach ($rows as $idx => $row) {
      ?>
        <div class="movie">
          <div style="width:35%">
            <a href="?do=intro&id=<?= $row['id']; ?>">
              <img src="./img/<?= $row['poster']; ?>" style="width:60px;border:3px solid white">
            </a>
          </div>
          <div style="width:65%">
            <div><?= $row['name']; ?></div>
            <div style="font-size:13px">分級：<img src="./icon/03C0<?= $row['level']; ?>.png" style="width:20px"></div>
            <div style="font-size:13px">上映日期：<?= $row['ondate']; ?></div>
          </div>
          <div style="width:100%">
            <button onclick="location.href='?do=intro&id=<?= $row['id']; ?>'">劇情介紹</button>
            <button onclick="location.href='?do=order&id=<?= $row['id']; ?>'">線上訂票</button>
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