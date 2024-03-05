<?php
$row=$Orders->find($_GET['id']);
?>
<h2 class="ct">訂單編號<span style="color:red"><?=$row['no'];?></span>的詳細資料</h2>

<form action="./api/order.php" method="post">
<table class="all">
	<tr>
		<td class="tt ct">會員帳號</td>
		<td class="pp"><?=$row['acc'];?></td>
	</tr>
	<tr>
		<td class="tt ct">姓名</td>
		<td class="pp"><?=$row['name'];?></td>
	</tr>
	<tr>
		<td class="tt ct">電子信箱</td>
		<td class="pp"><?=$row['email'];?></td>
	</tr>
	<tr>
		<td class="tt ct">聯絡住址</td>
		<td class="pp"><?=$row['addr'];?></td>
	</tr>
	<tr>
		<td class="tt ct">聯絡電話</td>
		<td class="pp"><?=$row['tel'];?></td>
	</tr>
</table>
<table class="all">
	<tr class="tt ct">
		<td>商品名稱</td>
		<td>編號</td>
		<td>數量</td>
		<td>單價</td>
		<td>小計</td>

	</tr>
	<?php
	$sum=0;
	$cart=unserialize($row['cart']);
	foreach($cart as $id=>$qt){
		$goods=$Goods->find($id);
	?>
	<tr class="pp ct">
		<td><?=$goods['name'];?></td>
		<td><?=$goods['no'];?></td>
		<td><?=$qt;?></td>
		<td><?=$goods['price'];?></td>
		<td><?=$goods['price']*$qt;?></td>
	</tr>
	<?php
	$sum+=$goods['price']*$qt; //這邊是計算 不要看成顯示= =
	}
	?>
</table>
<div class="all ct tt">總價:<?=$sum;?>元</div>
<div class="ct">
	<input type="button" value="返回" onclick="location.href='?do=order'">
	<!--在order資料表上方欄位幾乎都有 但總價欄位要寫入 所以帶hidden total過去才可存入-->
	<!-- 我想不帶id過去是因為這是新增寫入 不是編輯~~~~也沒有id可以帶~~~ -->
</div>
</form>