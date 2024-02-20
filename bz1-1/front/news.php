<!-- news區域 -->
<style>
	.cent >a{
		text-decoration: none;
	}
</style>
<div class="di" style="height:540px; border:#999 1px solid; width:53.2%; margin:2px 0px 0px 0px; float:left; position:relative; left:20px;">
	<!-- marquee start -->
	<?php include "marquee.php"; ?>
	<!-- marquee end -->
	<div style="height:32px; display:block;"></div>
	<!--正中央-->
	<h3 class="cent">最新消息顯示區</h3>
	<hr>
	<?php
	$total=$News->count(['sh'=>1]);
	$div=5;
	$pages=ceil($total/$div);
	$now=$_GET['p']??1;
	$start=($now-1)*$div;
	$news=$News->all(['sh'=>1]," limit $start,$div");
	?>
		<ol start='<?=$start+1;?>' style='position:relative'>
			<?php
			foreach($news as $n){
				echo "<li class='sswww'>";
				echo mb_substr($n['text'],0,20);
				echo "<div class='all' style='display:none'>";
				echo $n['text'];
				echo "</div>";
				echo "...</li>";
			}
		?>
		</ol>
		<div class="cent">
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
			$next=$now-1;
			echo "<a href='?do=news&p=$next'> > </a>";
		}

		?>
		</div>
	<!-- <div style="text-align:center;">
		<a class="bl" style="font-size:30px;" href="?do=meg&p=0">&lt;&nbsp;</a>
		<a class="bl" style="font-size:30px;" href="?do=meg&p=0">&nbsp;&gt;</a>
	</div> -->
</div>
<!-- news區域 -->
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