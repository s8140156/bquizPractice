<div style="width:99%; height:87%; margin:auto; overflow:auto; border:#666 1px solid;">
	<p class="t cent botli">動畫圖片管理</p>
	<form method="post" action="./api/edit.php">
		<table width="100%">
			<tbody>
				<tr class="yel">
					<td width="45%">動畫圖片</td>
					<td width="7%">顯示</td>
					<td width="7%">刪除</td>
					<td></td>
				</tr>
				<?php
				$rows=$DB->all();
				foreach($rows as $row){
				?>
				<tr>
					<td width="45%"><img src="./img/<?=$row['img'];?>" style="width:150px;height:100px"></td>
					<td width="7%"><input type="checkbox" name="sh[]" value="<?=$row['id'];?>" <?=($row['sh']==1)?'checked':'';?>></td>
					<td width="7%"><input type="checkbox" name="del[]" value="<?=$row['id'];?>">
									<input type="hidden" name="id[]" value="<?=$row['id'];?>"></td>
					<td>
						<input type="button" value="更新動畫" onclick="op('#cover','#cvr','./modal/upload.php?table=<?=$do;?>&id=<?=$row['id'];?>')">
					</td>
				</tr>
				<?php 		}
				?>
			</tbody>
		</table>
		<table style="margin-top:40px; width:70%;">
			<tbody>
				<tr>
					<td width="200px">
						<input type="button" onclick="op('#cover','#cvr','./modal/<?=$do;?>.php?table=<?=$do;?>')" value="新增動畫圖片"></td>
					<td class="cent"><input type="submit" value="修改確定"><input type="reset" value="重置"><input type="hidden" name="table" value="<?=$do;?>">
					</td>
				</tr>
			</tbody>
		</table>

	</form>
</div>