<style>
	.item {
		display: flex;
		padding: 3px;
		margin: 3px;
		justify-content: space-between;
		align-items: center;
        background-color: darkgoldenrod;

	}

	.item div {
		width: 24.5%;
		margin: 0 0.25%;
		text-align: center;
	}
</style>
<div>
	<h3 class="ct">預告片清單</h3>
	<div style="display:flex;justify-content:space-between">
		<div class="ct" style="width:24.5%;margin:0 0.25%; background-color:#ccc">預告片海報</div>
		<div class="ct" style="width:24.5%;margin:0 0.25%; background-color:#ccc">預告片片名</div>
		<div class="ct" style="width:24.5%;margin:0 0.25%; background-color:#ccc">預告片排序</div>
		<div class="ct" style="width:24.5%;margin:0 0.25%; background-color:#ccc">操作</div>
	</div>
	<form action="./api/edit_poster.php" method="post">
		<div style="width:100%; height:190px;overflow:auto">
			<?php
			$pos = $Poster->all(" order by rank");
			foreach ($pos as $idx => $po) {
			?>
				<div class="item">
					<div><img src="./img/<?=$po['img'];?>" style="width:60px;height:80px" alt=""></div>
					<div><input type="text" name="name[]" value="<?=$po['name'];?>" id=""></div>
					<div>
						<input class="btn" type="button" data-id="<?=$po['id'];?>" data-sw="<?=($idx!==0)?$pos[$idx-1]['id']:$po['id'];?>" value="往上">
						<input class="btn" type="button" data-id="<?=$po['id'];?>" data-sw="<?=(count($pos)-1!=$idx)?$pos[$idx+1]['id']:$po['id'];?>" value="往下"></div>
					<div>
						<input type="hidden" name="id[]" value="<?=$po['id'];?>">
						<!-- input:checkbox*2+select>option*3 -->
						<input type="checkbox" name="sh[]" value="<?=$po['id'];?>" <?=($po['sh']==1)?'checked':'';?>>顯示<input type="checkbox" name="del[]" value="<?=$po['id'];?>" id="">刪除
						<select name="ani[]" id="">
							<option value="1" <?=($po['ani']==1)?'selected':'';?>>淡入淡出</option>
							<option value="2" <?=($po['ani']==2)?'selected':'';?>>縮放</option>
							<option value="3" <?=($po['ani']==3)?'selected':'';?>>滑入滑出</option>
						</select>
					</div>
				</div>
			<?php
			}
	
			?>
		</div>
		<!-- 這邊可以在畫面上用F12實測 只要高度不要超過畫面即可 -->
		<div class="ct"><input type="submit" value="編輯確定"><input type="reset" value="重置"></div>
	</form>
</div>
<hr>
<div>
	<h3 class="ct">新增預告片海報</h3>
	<form action="./api/add_poster.php" method="post" enctype="multipart/form-data">
		<table class="ts">
			<tr>
				<td class="ct">預告片海報</td>
				<td class="ct"><input type="file" name="poster" id=""></td>
				<td class="ct">預告片片名</td>
				<td class="ct"><input type="text" name="name" id=""></td>
			</tr>
		</table>
		<div class="ct"><input type="submit" value="新增"><input type="reset" value="重置"></div>
	</form>

</div>
<script>
	$(".btn").on("click",function(){
		let id=$(this).data('id');
		let sw=$(this).data('sw');
		let table='poster';
		$.post("./api/sw.php",{id,sw,table},()=>{
			location.reload()
			//  使用reload 畫面會重新載入 結果不會看到你換上換下的位置 會是從新來過喔
		})
	})

</script>