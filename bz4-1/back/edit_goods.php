<h2 class="ct">修改商品</h2>
<?php //注意 這是從back/th 按下修改button來的 by $_GET['id'] 單~筆~
$row=$Goods->find($_GET['id']);
?>
<form action="./api/save_goods.php" method="post" enctype="multipart/form-data"> <!--這邊注意因為有上傳圖片 要記得加ecntype-->
	<table class="all">
		<tr>
			<th class="tt ct">所屬大分類</th>
			<td class="pp"><select name="big" id="big"></select></td> <!--大中分類是用ajax方式取得別忘記設定id 使用id來取-->
		</tr>
		<tr>
			<th class="tt ct">所屬中分類</th>
			<td class="pp"><select name="mid" id="mid"></select></td>
		</tr>
		<tr>
			<th class="tt ct">商品編號</th>
			<td class="pp"><?=$row['no'];?></td>
		</tr>
		<tr>
			<th class="tt ct">商品名稱</th>
			<td class="pp"><input type="text" name="name" value="<?=$row['name'];?>"></td>
		</tr>
		<tr>
			<th class="tt ct">商品價格</th>
			<td class="pp"><input type="text" name="price" value="<?=$row['price'];?>"></td>
		</tr>
		<tr>
			<th class="tt ct">規格</th>
			<td class="pp"><input type="text" name="spec" value="<?=$row['spec'];?>"></td>
		</tr>
		<tr>
			<th class="tt ct">庫存量</th>
			<td class="pp"><input type="text" name="stock" value="<?=$row['stock'];?>"></td>
		</tr>
		<tr>
			<th class="tt ct">商品圖片</th>
			<td class="pp"><input type="file" name="img" id="img"></td>
		</tr>
		<tr>
			<th class="tt ct">商品介紹</th>
			<td class="pp"><textarea name="intro" style="width:80%;height:200px"><?=$row['intro'];?></textarea></td>
		</tr>
	</table>
	<div class="ct">
		<input type="hidden" name="id" value="<?=$row['id'];?>"> <!--這次練習因為編輯後沒有帶id去api/save那邊 所以會造成只有新增 請注意-->
		<input type="submit" value="修改">
		<input type="reset" value="重置">
		<input type="button" value="返回" onclick="location.href='?do=th'">
	</div>
</form>
<script>
	getTypes('big',0);
	$('#big').on('change',function(){ //增傾聽事件
		getTypes('mid',$('#big').val())
	})
	function getTypes(type,big_id){
		$.get('./api/get_types.php',{big_id},(types)=>{
			switch(type){
				case 'big':
					$('#big').html(types)
					getTypes('mid',$('#big').val())
				break;
				case 'mid':
					$('#mid').html(types)
				break;
			}
		})
	}

</script>