<h2 class="ct">商品分類</h2>
<div class="ct">新增大分類<input type="text" name="big" id="big"><button onclick="addType('big')">新增</button></div>
<div class="ct">
    新增中分類
    <select name="big" id="bigs"></select>
    <input type="text" name="mid" id="mid">
    <button onclick="addType('mid')">新增</button>
</div>
<table class="all">
    <?php
    $bigs=$Type->all(['big_id'=>0]);
    foreach($bigs as $big){
    ?>
    <tr class="tt">
        <td><?=$big['name'];?></td>
        <td class="ct">
            <button onclick="edit(this,<?=$big['id'];?>)">修改</button>
            <button onclick="del('type',<?=$big['id'];?>)">刪除</button>
        </td>
    </tr>
    <?php
    $mids=$Type->all(['big_id'=>$big['id']]);
    foreach($mids as $mid){
    ?>
    <tr class="pp ct">
        <td><?=$mid['name'];?></td>
        <td><button onclick="edit(this,<?=$mid['id'];?>)">修改</button>
            <button onclick="del('type',<?=$mid['id'];?>)">刪除</button>
        </td>
    </tr>
    <?php  
        } //注意這邊包法 看起來bigs迴圈裡面再包mids迴圈
    }
    ?>
</table>
<script>
    getTypes(0);
    function getTypes(big_id){
        $.get('./api/get_types.php',{big_id},(types)=>{
            $('#bigs').html(types)
        })
    }
    function addType(type){
        let name
        let big_id
        switch(type){
            case 'big':
                name=$('#big').val()
                big_id=0;
            break;
            case 'mid':
                name=$('#mid').val()
                big_id=$('#bigs').val();
            break;
        }
        $.post('./api/save_type.php',{name,big_id},()=>{
            location.reload()
        })
    }
    function edit(dom,id){
        let text=$(dom).parent().prev().text()
        let name=prompt('請輸入要修改的分類文字:',text)
        if(name!=''){
            $.post('./api/save_type.php',{name,id},()=>{
                $(dom).parent().prev().text(name)
            })
        }
    }
</script>
<h2 class="ct">商品管理</h2>
<div class="ct"><button onclick="location.href='?do=add_goods'">新增商品</button></div>
<table class="all">
    <tr class="tt ct">
        <td>編號</td>
        <td>商品名稱</td>
        <td>庫存量</td>
        <td>狀態</td>
        <td>操作</td>
    </tr>
    <?php
    $rows=$Goods->all();
    foreach($rows as $row){ 
    ?>
    <tr class="pp ct">
        <td><?=$row['no'];?></td>
        <td><?=$row['name'];?></td>
        <td><?=$row['stock'];?></td>
        <td><?=($row['sh']==1)?'上架':'下架';?></td>
        <td>
            <button onclick="location.href='?do=edit_goods&id=<?=$row['id'];?>'">修改</button> <!--那個..請注意帶id寫法 &id=-->
            <button onclick="del('goods',<?=$row['id'];?>)">刪除</button>
            <button onclick="sh(1,<?=$row['id'];?>)">上架</button>
            <button onclick="sh(0,<?=$row['id'];?>)">下架</button>
        </td>
    </tr>
    <?php   }
    ?>
</table>
<script>
    function sh(sh,id){
        $.post('./api/sh.php',{id,sh},()=>{
            location.reload()
        })
    }

</script>
