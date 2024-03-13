<h3 class="cent">新增主選單</h3>
<hr>
<form action="./api/add.php" method="post" enctype="multipart/form-data"> <!--可要記得啊 上傳檔案要用ecntype-->
    <table>
        <tr>
            <td>主選單名稱：</td>
            <td><input type="text" name="text" id=""></td>
        </tr>
        <tr>
            <td>選單連結網址：</td>
            <td><input type="text" name="href" id=""></td>
        </tr>
    </table>
    <div class="cent">
        <input type="submit" value="新增">
        <input type="reset" value="重置">
        <input type="hidden" name="table" value="<?=$_GET['table'];?>">
    </div>

</form>