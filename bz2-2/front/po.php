<style>
    .types, .news-list{
        display: inline-block;
        vertical-align: top;
    }
    .type-items{
        display: block;
        margin: 3px 6px;
    }
    .news-list{
        width: 600px;
    }
</style>
<div class="nav">
    目前位置：首頁 > 分類網誌 > <span class="type">健康新知</span>
</div>
<fieldset class="types">
    <legend>分類網誌</legend>
    <a class="type-items" data-type="1">健康新知</a>
    <a class="type-items" data-type="2">菸害防治</a>
    <a class="type-items" data-type="3">癌症防治</a>
    <a class="type-items" data-type="4">慢性病防治</a>
</fieldset>
<fieldset class="news-list">
    <legend>文章列表</legend>
    <div class="list-items" style="display:none"></div>
    <div class="article"></div>
</fieldset>
<script>
    getList(1)
    $('.type-items').on('click',function(){
        $('.type').text($(this).text())
        let type=$(this).data('type')
        getList(type)
    })
    function getList(type){
        $.get('./api/get_list.php',{type},(list)=>{
            $('.list-items').html(list)
            $('.article').hide()
            $('.list-items').show()
        })
    }
    function getNews(id){
        $.get('./api/get_news.php',{id},(news)=>{
            $('.article').html(news)
            $('.article').show()
            $('.list-items').hide()
            
            
        })
    }

</script>
