<?php

include_once "db.php";

$_POST['no']=date('Ymd').rand(100000,999999); //這是訂單編號
$_POST['cart']=serialize($_SESSION['cart']);
$_POST['acc']=$_SESSION['mem'];

$Orders->save($_POST);

unset($_SESSION['cart']); //這個動作會在結帳後清空session


?>
<script>
	alert('訂購成功，\n感謝您的選購');
	location.href="../index.php";
</script>