<h3 class="cent">新增動畫圖片</h3>
<hr>
<form action="./api/add.php" method="post" enctype="multipart/form-data"> <!--可要記得啊 上傳檔案要用ecntype-->
    <table>
        <tr>
            <td>動畫圖片：</td>
            <td><input type="file" name="img" id=""></td>
        </tr>
    </table>
    <div class="cent">
        <input type="submit" value="新增">
        <input type="reset" value="重置">
        <input type="hidden" name="table" value="<?=$_GET['table'];?>">
    </div>

</form>