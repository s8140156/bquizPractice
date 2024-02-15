<h3 class="cent">新增動態文字廣告</h3>
<hr>
<form action="./api/add.php" method="post" enctype="multipart/form-data">
    <table style="margin:auto">
        <tr>
            <td>動態文字廣告</td>
            <td><input type="text" name="text" id=""></td>
        </tr>
    </table>
    <div class="cent">
        <input type="hidden" name="table" value="<?=$_GET['table'];?>"> 
        <!--注意要加hidden欄位 接收從back/title按下新增圖片時 傳來的table參數；還有這是給有新增圖片使用的各種功能使用-->
        <input type="submit" value="新增">
        <input type="reset" value="重置">
    </div>
</form>
