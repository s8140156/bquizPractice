<h2 class="ct">新增管理帳號</h2>
<form action="./api/save_admin.php" method="post">
    <table class="all">
        <tr>
            <td class="tt ct">帳號</td>
            <td class="pp"><input type="text" name="acc" id="acc"></td>
        </tr>
        <tr>
            <td class="tt ct">密碼</td>
            <td class="pp"><input type="text" name="pw" id="pw"></td>
        </tr>
        <tr>
            <td class="tt ct">權限</td>
            <td class="pp">
                <input type="checkbox" name="pr[]" value="1">商品分類與管理<br>
                <input type="checkbox" name="pr[]" value="2">訂單管理<br>
                <input type="checkbox" name="pr[]" value="3">訂單報表<br>
                <input type="checkbox" name="pr[]" value="4">會員管理<br>
                <input type="checkbox" name="pr[]" value="5">頁尾版權區管理<br>
                <input type="checkbox" name="pr[]" value="6">最新消息管理<br>
        </td>
        </tr>
    </table>
    <div class="ct">
        <input type="submit" value="新增"> | <input type="reset" value="重置">
    </div>
</form>