<?php
$row=$Admin->find($_GET['id']); 
//從back/admin 修改button透過網址傳值來的 所以這邊用find取id 請回想畫面 是單筆資料修改
$row['pr']=unserialize($row['pr']);
?>
<h2 class="ct">修改管理員權限</h2>
<form action="./api/save_admin.php" method="post">
    <table class="all">
        <tr>
            <td class="tt ct">帳號</td>
            <td class="pp"><input type="text" name="acc" value="<?=$row['acc'];?>"></td>
        </tr>
        <tr>
            <td class="tt ct">密碼</td>
            <td class="pp"><input type="password" name="pw" value="<?=$row['pw'];?>"></td>
        </tr>
        <tr>
            <td class="tt ct">權限</td>
            <td class="pp">
                <input type="checkbox" name="pr[]" value="1" <?=(in_array(1,$row['pr']))?'checked':'';?>>商品分類與管理<br>
                <input type="checkbox" name="pr[]" value="2" <?=(in_array(2,$row['pr']))?'checked':'';?>>訂單管理<br>
                <input type="checkbox" name="pr[]" value="3" <?=(in_array(2,$row['pr']))?'checked':'';?>>訂單報表<br>
                <input type="checkbox" name="pr[]" value="4" <?=(in_array(3,$row['pr']))?'checked':'';?>>會員管理<br>
                <input type="checkbox" name="pr[]" value="5" <?=(in_array(4,$row['pr']))?'checked':'';?>>頁尾版權區管理<br>
                <input type="checkbox" name="pr[]" value="6" <?=(in_array(5,$row['pr']))?'checked':'';?>>最新消息管理<br>
        </td>
        </tr>
    </table>
    <div class="ct">
        <input type="hidden" name="id" value=<?=$row['id'];?>> <!--誒這邊是單筆修改 所以id是單筆不是陣列 會造成pr帶過去無法寫入喔-->
        <input type="submit" value="修改"> | <input type="reset" value="重置">
    </div>
</form>