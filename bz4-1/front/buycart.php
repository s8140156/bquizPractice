<?php
if(isset($_GET['id']) && isset($_GET['qt'])){
	$_SESSION['cart'][$_GET['id']]=$_GET['qt']; // id=>qt(用id作為鍵值) ;key=>value	
}

if(!isset($_SESSION['mem'])){
	to('?do=login');
}
echo "<h2 class='ct'>{$_SESSION['mem']}的購物車</h2>";

if(empty($_SESSION['cart'])){
	echo "<h2 class='ct'>購物車中尚無商品</h2>";
}else{
	// else就是有購物車內容 這邊下面就是包顯示的東西, 所以結尾的}要包到script結束
?>
<table class="all">
	<tr class="tt ct">
		<td>編號</td>
		<td>商品名稱</td>
		<td>數量</td>
		<td>庫存量</td>
		<td>單價</td>
		<td>小計</td>
		<td>刪除</td>
	</tr>
	<?php
	foreach($_SESSION['cart'] as $id=>$qt){
		$goods=$Goods->find($id);
	?>
	<tr class="pp ct">
		<td><?=$goods['no'];?></td>
		<td><?=$goods['name'];?></td>
		<td><?=$qt;?></td>
		<td><?=$goods['stock'];?></td>
		<td><?=$goods['price'];?></td>
		<td><?=$goods['price']*$qt;?></td>
		<td><img src="./icon/0415.jpg" onclick="delCart(<?=$id;?>)"></td>
	</tr>
	<?php }
	?>
</table>
<div class="ct"><img src="./icon/0411.jpg" onclick="location.href='index.php'">&nbsp;&nbsp;<img src="./icon/0412.jpg" onclick="location.href='?do=checkout'"></div>
<script>
	function delCart(){
		$.post('./api/del_cart.php',{id},()=>{
			location.href='?do=buycart';
		})
	}
</script>
<?php }
?>
