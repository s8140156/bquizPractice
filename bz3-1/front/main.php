<style>
  .lists{
    width:200px; /*將lists長寬範圍設定與item一致(限縮範圍) 才不會有動畫產生第一張為動作完結果第二張被撐開 匡在同一區域*/
    height: 240px;
    position: relative;
    left: 114px; /*如果不左移 item原先定位會是預設左上對齊((428-200)/2)並剩下空間要/2才會置中對齊*/
    overflow: hidden; /*將多餘的隱藏掉*/
  }
  .item *{
    box-sizing: border-box; /*不被padding影響*/
  }
  .item{ /*主預告片區域 先做隱藏應該點選下面預告片時change, item底下帶圖跟字*/
    width:200px;
    height: 240px;
    position: absolute; /*上下階設定position,對齊左上角位置 這樣動畫會有前後交疊的效果*/
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
    position: relative; /*需加position才能做動畫的移動(造成平移)*/
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
  $('.item').eq(0).show() //eq選擇位置(索引值)在哪 (選擇第一張海報先顯示)
  let total=$('.btn').length //計算海報有幾張
  let now=0 //這是輪播 先是設定第一張為index0(eq(0))
  let next=0  //由於後面加入了如果插播後的動畫順序 所以先將next預設0
  let timer=setInterval(()=>{slide()},3000) //setInterval需要用回呼函式把funtion叫出來 or
  // let timer=setInterval("slide()",3000) //這是第一題輪播寫法 用字串的方式寫出function
  function slide(n){ //這邊的n是代表 看是哪種型態的輪播(by idx自動輪播 還是by click插進來的輪播)
    let ani=$('.item').eq(now).data('ani');
    if(typeof(n)=='undefined'){ //確認傳入的n值是什麼資料型態, 如果n值沒有值(n=undefined),就now+1及確認總共張數
      next=now+1;
      if(next>=total){
        next=0;
      } 
    }else{ //如果n有值(就是插撥進來的idx), 就把n帶入next
      next=n;
    }
    // console.log(ani,now,next,total);
    switch(ani){
      case 1:
        $('.item').eq(now).fadeOut(1000,function(){
          // now++;
          // if(now>=total){
          //   now=0  //把重複的程式拉上去共同處理
          // }
          $('.item').eq(next).fadeIn(1000)
        }) //show/hide帶入時間後 本身帶有縮放功能
      break;
      case 2:
        $('.item').eq(now).hide(1000,function(){
          $('.item').eq(next).show(1000)
        }) 
      break;
      case 3:
        $('.item').eq(now).slideUp(1000,function(){
          $('.item').eq(next).slideDown(1000)
        })
      break;
    }
    now=next; //如果不加這個無法循環 f12會顯示卡到(next跑完交棒給now)
  }

  let p=0 //決定p的位置(個數 幾個90)為0, 如果0*90=0(原點) 如果1*90=90(距離原來位置90)
  //將p拉到function外面變成"全域變數",才不會當點選後(如果在function內)即馬上回到原點0(老師提有點像session概念 就是記住你的操作狀況 可以一直順應下去)
  // console.log(total)
  $('.left,.right').on('click',function(){
    let arrow=$(this).attr('class')
    switch(arrow){
      case "right":
        if(p+1<=(total-4)){
          p=p+1
        }
      break;
      case "left":
        if(p-1>=0){
          p=p-1
        }
      break;
    }
    // console.log(p)
    $('.btn').animate({right:90*p}) //使用以右邊計算距離(因為左邊會有-)
    // 因為往左往右都是使用animate 90*p 所以共通程式拉出來寫 switch只要控制個數p即可
  })
  $('.btn').on('click',function(){
    let idx=$(this).index()
    // console.log($(this).index())
    // $('.item').hide()
    // $('.item').eq(idx).show()
    slide(idx)

  })
  $('.btn').hover( //這是當主海報正在輪播時,滑鼠移入下方預告btn時 先停止輪播動作(使用clearInterval);若移出再恢復動作
    // 此次是設定在預告btn這個範圍內 若要擴大當點選左右鍵即停止 可以再往上層設定.btn->.controls
    function(){
      clearInterval(timer)
    }, //注意兩個function的分隔以, 不是; 而且是需要有符號分隔 不然會有錯誤訊息
    function(){
      timer=setInterval(()=>{slide()},3000)
    }
  )
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