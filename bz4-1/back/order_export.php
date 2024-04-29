<?php
// dd($_POST);

if(!empty($_POST)){
	$rows=$Orders->all(" where `no` in ('".join("','",$_POST['select']). "')");
	// 針對不連續資料撈出 使用sql in(依你選定條件放帶出)
	// 這邊是把選定的資料 然後全部(全欄位)列出來
	$filename=date("Ymd").rand(100000000,999999999);
	$file=fopen("./doc/{$filename}.csv",'w+'); // fopen() w+:開啟可讀/可寫的檔案(我覺得是產生檔案);如果檔案不存在會建立新檔案
	fwrite($file, "\xEF\xBB\xBF"); //BOM轉碼編譯 讓文字不會亂碼 big50->utf8 一樣用fwrite()寫入
	$chk=false; //使用在要加入"第一列欄位名稱"的判斷變數
	foreach($rows as $row){
		if(!$chk){ //欄位只做一次 而且只做第一次 如果沒有這個判斷及寫入 匯出的資料沒有表頭
			$cols=array_keys($row); //取鍵值 就是欄位
			fwrite($file,join(",",$cols)."\r\n"); // \r\n斷行 寫入$file這個檔案 使用join把欄位串接起來形式
			$chk=true; //只做第一次 後面就不再取
			// 另一種寫法是foreach $idx($key) 設定idx=0執行 其他不做
		}
		fwrite($file,join(",",$row)."\r\n"); //斷行
	}
	fclose($file); // 寫完檔案後要將檔案關閉
	echo "<a href='./doc/{$filename}.csv' download>檔案已匯出，請點此連結下載</a>";
	// a tag裡面要加download 是檔案可以被下載 如果不加  選定好的資料會直接在html打開
}
?>
<style>
    table{
        border-collapse: collapse;
    }
    td{
        border:1px solid #666;
        padding:5px 12px;
    }
    th{
        border:1px solid #666;
        padding:5px 12px;
        background-color: black;
        color:white;
    }
</style>
<script src="./js/jquery-3.4.1.min.js"></script>
<form action="?do=order_export" method="post">
	<input type="submit" value="匯出選擇的資料">
<table>
	<tr>
		<th>
			<input type="checkbox" name="" id="select"><!--這個是全部選取-->
			選取</th>
		<th>ID</th>
		<th>訂單編號</th>
		<th>訂單金額</th>
		<th>會員帳號</th>
		<th>會員姓名</th>
		<th>電子信箱</th>
		<th>地址</th>
		<th>電話</th>
		<th>購物車品項</th>
	</tr>
<?php
$order=$Orders->all();
foreach($order as $n){
?>
    <tr>
        <td><input type="checkbox" name="select[]" value="<?=$n['no'];?>"></td>
        <td><?=$n['id'];?></td>
        <td><?=$n['no'];?></td>
        <td><?=$n['total'];?></td>
        <td><?=$n['acc'];?></td>
        <td><?=$n['name'];?></td>
        <td><?=$n['email'];?></td>
        <td><?=$n['addr'];?></td>
        <td><?=$n['tel'];?></td>
        <td><?=$n['cart'];?></td>
    </tr>
<?php
}
?>
</table>
</form>
<script>
	$('#select').on("change",function(){ //全選寫法
		if($(this).prop('checked')){ // 確認點選下去 使用prop()(property)確認狀況checked or not checked
			$("input[name='select[]']").prop('checked',true);
		}else{
			$("input[name='select[]']").prop('checked',false);
		}
	})

</script>




