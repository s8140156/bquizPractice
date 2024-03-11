<style>
    .types, .list{
        display: inline-block;
        vertical-align: top;
    }
    .type-item{
        display:block;
        padding: 3px 6px;
    }
    .list{
        width: 600px;
    }
</style>
<div class="nav">
    目前位置：首頁 > 分類網誌 > <span class="type">健康新知</span>
</div>
<fieldset class="types">
    <legend>分類網誌</legend>
    <a class="type-item" data-type="1">健康新知</a>
    <a class="type-item" data-type="2">菸害防治</a>
    <a class="type-item" data-type="3">癌症防治</a>
    <a class="type-item" data-type="4">慢性病防治</a>
</fieldset>
<fieldset class="list">
    <legend>文章列表</legend>
    <div class="list-item"></div>
    <div class="article"></div>
</fieldset>
<script>
    getList(1);
    $('.type-item').on('click',function(){
        $('.type').text($(this).text())
        let type=$(this).data('type')
        getList(type);
    })
    function getList(type){
        $.get('./api/get_list.php',{type},(list)=>{
            $('.list-item').html(list)
            $('.article').hide()
            $('.list-item').show()
        })
    }
    function getNews(id){
        $.get('./api/get_news.php',{id},(news)=>{
            $('.article').html(news)
            $('.article').show()
            $('.list-item').hide()
        })
    }
</script>
