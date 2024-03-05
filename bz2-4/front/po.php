<style>
    .types, .news-list{ /*真的不要再忘記加逗點*/
        display: inline-block;
        vertical-align: top;
    }
    .type-item{
        display: block;
        margin: 5px 6px;
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
    <a class="type-item" data-type="1">健康新知</a> <!--如果不把href刪掉 麵包屑的變化只會閃-->
    <a class="type-item" data-type="2">菸害防治</a>
    <a class="type-item" data-type="3">癌症防治</a>
    <a class="type-item" data-type="4">慢性病防治</a>
</fieldset>
<fieldset class="news-list">
    <legend>文章列表</legend>
    <div class="list-item" style="display:none"></div>
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
        $.post('/.api/get_list.php',{type},(res)=>{
            $('.list-item').html(res)
            $('.article').hide()
            $('.list-item').show()

        })
    }
</script>