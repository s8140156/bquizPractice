<?php include_once "./api/db.php"; ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<!-- saved from url=(0040)http://127.0.0.1/test/exercise/collage/? -->
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

	<title>(練習2_前)卓越科技大學校園資訊系統</title>
	<link href="./css/css.css" rel="stylesheet" type="text/css">
	<script src="./js/jquery-1.9.1.min.js"></script>
	<script src="./js/js.js"></script>
</head>

<body>
	<div id="cover" style="display:none; ">
		<div id="coverr">
			<a style="position:absolute; right:3px; top:4px; cursor:pointer; z-index:9999;" onclick="cl(&#39;#cover&#39;)">X</a>
			<div id="cvr" style="position:absolute; width:99%; height:100%; margin:auto; z-index:9898;"></div>
		</div>
	</div>
	<!-- <iframe style="display:none;" name="back" id="back"></iframe> --><!--去除iframe-->
	<div id="main">
		<?php
		$title=$Title->find(['sh'=>1]);
		?>
		<a title="<?=$total['text'];?>" href="index.php">
			<div class="ti" style="background:url(&#39;./img/<?=$title['img'];?>&#39;); background-size:cover;"></div><!--標題-->
		</a>
		<div id="ms">
			<div id="lf" style="float:left;">
				<div id="menuput" class="dbor">
					<!--主選單放此-->
					<span class="t botli">主選單區</span> <!--從這邊開始寫選單表列!!!-->
					<?php
					$rows=$Menu->all(['sh'=>1,'menu_id'=>0]); //主選單就是先找menu_id=0
					foreach($rows as $row){
					?>
					<div class="mainmu"> <!--mainmu是既有css樣式-->
						<a href="<?=$row['href'];?>" style="color:#000;font-size:13px;text-decoration:none">
						<?=$row['text'];?>
						</a>
						<?php
						if($Menu->count(['menu_id'=>$row['id']])>0){ //先確認是否有次選單(與撈出來主選單比)
							echo "<div class='mw'>"; //如果有次選單的menu_id 才顯現次選單樣式
							$subs=$Menu->all(['menu_id'=>$row['id']]);
							foreach($subs as $sub){
								echo "<a href='{$sub['href']}'>";
								echo "<div class='mainmu2'>"; //既有格式
								echo $sub['text'];
								echo "</div>";
								echo "</a>";
							}
							echo "</div>";
						}
						?>
					</div>
					<?php } ?>
				</div>
				<div class="dbor" style="margin:3px; width:95%; height:20%; line-height:100px;">
					<span class="t">進站總人數 :<?=$Total->find(5)['total'];?></span>
				</div>
			</div>
			<!-- class=di start 拆去front/main -->
			<?php
			$do=$_GET['do']??'main';
			$file="./front/{$do}.php";
			if(file_exists($file)){
				include $file;
			}else{
				include "./front/main.php";
			}
			?>
			<!-- class=di end 拆去front/main -->
			<div id="alt" style="position: absolute; width: 350px; min-height: 100px; word-break:break-all; text-align:justify;  background-color: rgb(255, 255, 204); top: 50px; left: 400px; z-index: 99; display: none; padding: 5px; border: 3px double rgb(255, 153, 0); background-position: initial initial; background-repeat: initial initial;">
			</div>
			<script>
				$(".sswww").hover(
					function() {
						$("#alt").html("" + $(this).children(".all").html() + "").css({
							"top": $(this).offset().top - 50
						})
						$("#alt").show()
					}
				)
				$(".sswww").mouseout(
					function() {
						$("#alt").hide()
					}
				)
			</script>
			<div class="di di ad" style="height:540px; width:23%; padding:0px; margin-left:22px; float:left; ">
				<!--右邊-->
				<?php
				if(isset($_SESSION['login'])){
					$url="lo('back.php')";
					$str="返回管理";
				}else{
					$url="lo('index.php?do=login')";
					$str="管理登入";
				}
				?>
				<button style="width:100%; margin-left:auto; margin-right:auto; margin-top:2px; height:50px;" onclick="<?=$url;?>"><?=$str;?></button>
				<div style="width:89%; height:480px;" class="dbor">
					<span class="t botli">校園映象區</span>
					<!-- 以下開始建立校園映像上下鍵及圖片放置 -->
					<div class="cent" style="margin:5px" onclick="pp(1)"><img src="./icon/up.jpg" alt=""></div> <!--新增-->
					<?php
					$rows=$Image->all(['sh'=>1]);
					foreach($rows as $idx=>$row){
					?>
					<div id="ssaa<?=$idx;?>" class="im cent">
					<img src="./img/<?=$row['img'];?>" style="width:150px;height:103px;border:3px solid #EE7728;margin:5px">
					</div>
					<?php
					}
					?>
					<div class="cent" style="margin:5px" onclick="pp(2)"><img src="./icon/dn.jpg" alt=""></div> <!--新增-->
					<script>
						var nowpage = 1,
							num = <?=$Image->count(['sh'=>1]);?>; //這邊就是page數依資料庫裡面的

						function pp(x) {
							var s, t;
							if (x == 1 && nowpage - 1 >= 0) {
								nowpage--;
							}
							if (x == 2 && nowpage < (num - 3)) { //這邊修改成nowpage < (num-3)
								nowpage++;
							}
							$(".im").hide()
							for (s = 0; s <= 2; s++) {
								t = s * 1 + nowpage * 1;
								$("#ssaa" + t).show()
							}
						}
						pp(1)
					</script>
				</div>
			</div>
		</div>
		<div style="clear:both;"></div>
		<div style="width:1024px; left:0px; position:relative; background:#FC3; margin-top:4px; height:123px; display:block;">
			<span class="t" style="line-height:123px;"><?=$Bottom->find(5)['bottom'];?></span>
		</div>
	</div>

</body>

</html>