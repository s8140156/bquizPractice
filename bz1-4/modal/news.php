<h3 class="cent">新增最新消息資料</h3>
<hr>
<form action="./api/add.php" method="post" enctype="multipart/form-data"> <!--可要記得啊 上傳檔案要用ecntype-->
    <table>
        <tr>
            <td>最新消息資料：</td>
            <!-- <td><input type="text" name="text" id=""></td> -->
            <td><textarea name="text" style="width:400px;height:150px"></textarea></td>

        </tr>

    </table>
    <div class="cent">
        <input type="submit" value="新增">
        <input type="reset" value="重置">
        <input type="hidden" name="table" value="<?=$_GET['table'];?>">
    </div>

</form>