			<!-- news di start -->
			<div class="di" style="height:540px; border:#999 1px solid; width:53.2%; margin:2px 0px 0px 0px; float:left; position:relative; left:20px;">
				<?php include "marquee.php"; ?>
				<div style="height:32px; display:block;"></div>
				<!--正中央-->
				<h3 class="cent">更多最新消息顯示區</h3>
				<hr>
				<?php
				$total=$News->count(['sh'=>1]);
				$div=5;
				$pages=ceil($total/$div);
				$now=$_GET['p']??1;
				$start=($now-1)*$div;
				$rows=$News->all(['sh'=>1]," limit $start,$div");
				?>
				<ol start="<?=$start+1;?>">
				<?php
				foreach($rows as $row){
				echo "<li class='sswww'>";
				echo mb_substr($row['text'],0,20);
				echo "<div class='all' style='display:none'>";
				echo $row['text'];
				echo "</div>";
				echo "...</li>";
				}
				?>
				</ol>
				<div class="cent">
			<?php
			if($now-1>0){
				$prev=$now-1;
				echo "<a href='?do=$do&p=$prev'> < </a>";
			}
			for($i=1;$i<=$pages;$i++){
				$size=($i==$now)?'font-size:22px':'font-size:16px';
				echo "<a href='?do=$do&p=$i' style='$size'> $i </a>";
			}
			if($now+1<=$pages){
				$next=$now+1;
				echo "<a href='?do=$do&p=$next'> > </a>";
			}
			?>
		</div>
			</div>
			<!-- news di end -->