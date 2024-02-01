<fieldset>
	<legend>忘記密碼</legend>
	<div>請輸入信箱以查詢密碼</div>
	<div><input type="text" name="email" id="email"></div>
	<div id="result"></div>
	<div><button onclick="forget()">尋找</button></div>
</fieldset>
<script>
	function forget(){
		$.post("./api/forget.php",{email:$('#email').val()},(res)=>{ //注意 傳送方式送與接收要一致 不然畫面會有錯誤訊息(Undefined array key)
			$('#result').text(res)
		})
	}

</script>