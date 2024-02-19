<?php include_once "../api/db.php"; ?> <!--注意這邊是上上層-->
<h3 class="cent">編輯次選單</h3>
<hr>
<form action="./api/submenu.php" method="post" enctype="multipart/form-data">
    <!-- 注意是特別寫的api不是共用是獨立的 -->
    <table style="text-align:center;margin:auto" id="sub">
        <tr>
            <td>次選單名稱</td>
            <td>次選單連結網址</td>
            <td>刪除</td>
        </tr>
        <?php
        $subs=$Menu->all(['menu_id'=>$_GET['id']]);
        foreach($subs as $sub){
        ?>
        <tr>
            <td><input type="text" name="text[]" value="<?=$sub['text'];?>"></td>
            <td><input type="text" name="href[]" value="<?=$sub['href'];?>"></td>
            <td>
                <input type="checkbox" name="del[]" value="<?=$sub['id'];?>">
            </td>
            <input type="hidden" name="id[]" value="<?=$sub['id'];?>">
        </tr>
        <?php }
        ?>
    </table>
    <div class="cent">
        <input type="hidden" name="table" value="<?=$_GET['table'];?>">
        <input type="hidden" name="menu_id" value="<?=$_GET['id'];?>">
        <!--將主選單id隱藏給api知道表單的次選單是屬於哪個主選單的-->
        <input type="submit" value="修改確定">
        <input type="reset" value="重置">
        <input type="button" value="更多次選單" onclick="more()">
    </div>
</form>
<script>
    function more(){
        let item=`
        <tr>
            <td><input type="text" name="add_text[]" id=""></td>
            <td><input type="text" name="add_href[]" id=""></td>
        </tr>
        `;
        $('#sub').append(item);
    }
</script>
