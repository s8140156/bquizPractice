
<style>
	.type-item{
		display:block; /*因為使用a tag 強制改成block顯示*/
		margin:3px 6px;
	}
	.types,.news-list{
		display: inline-block; /*讓2個fieldset並列*/
		vertical-align: top;  /*靠上對齊*/
	}
	.news-list{
		width:600px;
	}
</style>

<div class="nav">目前位置:首頁 > 分類網誌 > <span class="type"></span></div>

<fieldset class="types"> <!--當畫面點選分類網誌時,讓nav區塊分類網誌後(type)跟著改標題-->
	<legend>分類網誌</legend>
	<a class="type-item" data-id="1">健康新知</a> <!--純粹id不建議使用數字 通常是英文＋數字-->
	<a class="type-item" data-id="2">菸害防治法規</a>
	<a class="type-item" data-id="3">癌症防治</a>
	<a class="type-item" data-id="4">慢性病防治</a>
</fieldset>
<fieldset class="news-list"> <!--當畫面點選分類網誌時, 使用ajax去後台取對應的文章列表-->
	<legend>文章列表</legend> 
	<div class="list-items" style="display:none"></div> <!--點選文章列表, 因為在畫面一載入時會先執行getList(1) 所以先讓列表隱藏讓toggle翻牌-->
	<div class="article"></div> <!--會出現對應的文章-->
</fieldset>

<script>
	getList(1)
	//在網頁載入時, 先讓文章列表先出現 使用type:1預設
	$('.type-item').on('click',function(){
		$('.type').text($(this).text())
		// 更新分類網誌標題  看起來text() or html()都是在更新裡面的內容 只是分文字or整體html(有完整標籤)
		let type=$(this).data('id')
		// 取得點擊的分類網誌的data-id屬性值
		// data('id') 讀取HTML元素 data-* 屬性
		getList(type)
		// 根據分類網誌的data-id值取得相應的文章列表
	})

	// 取得文章列表的函數
	function getList(type){
		$.get("./api/get_list.php",{type},(list)=>{
			// {type}=>{type(欄位):type(值)}的縮寫 送給後台的是$_GET['type'(欄位)]
			$('.list-items').html(list)
			// 透過ajax回傳的list 更新.list-items的文章列表
			// $(".article,.list-items").toggle()
			$('.article').hide();
			$('.list-items').show();


		})
	}

	// 取得單篇文章的函數
	function getNews(id){
		$.get("./api/get_news.php",{id},(news)=>{
			$('.article').html(news)
			// $(".article,.list-items").toggle()
			$('.article').show();
			$('.list-items').hide();

		})
	}
</script>

