<!-- news di start -->
<div class="di" style="height:540px; border:#999 1px solid; width:53.2%; margin:2px 0px 0px 0px; float:left; position:relative; left:20px;">
<?php include "marquee.php"; ?>
	<div style="height:32px; display:block;"></div>
	<!--正中央-->
	<h3>更多最新消息顯示區</h3>
	<hr>
	<?php
	$total=$DB->count();
	$div=5;
	$pages=ceil($total/$div);
	$now=$_GET['p']??1;
	$start=($now-1)*$div;
	$rows=$DB->all(" limit $start,$div");
	?>
	<ol start="<?=$start+1;?>">
		<?php
		foreach($rows as $row){
			echo "<li>";
            echo mb_substr($row['text'],0,20);
            echo "<div class='all' style='display:none'>";
            echo $row['text'];
            echo "</div>";
            echo "...</li>";
		}
	?>

	</ol>
</div>
<!-- news di end -->