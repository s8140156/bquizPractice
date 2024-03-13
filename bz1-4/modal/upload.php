<?php
switch($_GET['table']){
    case "title":
        echo "<h3>更新標題區圖片</h3>";
    break;
    case "mvim":
        echo "<h3>更新動畫圖片</h3>";
    break;
    case "image":
        echo "<h3>更新校園映像圖片</h3>";
    break;
}
?>
<hr>
<form action="./api/upload.php" method="post" enctype="multipart/form-data"> <!--可要記得啊 上傳檔案要用ecntype-->
    <table>
        <tr>
            <?php
            switch($_GET['table']){
                case "title":
                    echo "<td>標題區圖片</td>";
                break;
                case "mvim":
                    echo "<td>動畫圖片</td>";
                break;
                case "image":
                    echo "<td>校園映像圖片</td>";
                break;
            }
            ?>
            <td><input type="file" name="img" value=""></td>
        </tr>
    </table>
    <div class="cent">
        <input type="submit" value="新增">
        <input type="reset" value="重置">
        <input type="hidden" name="table" value="<?=$_GET['table'];?>">
        <input type="hidden" name="id" value="<?=$_GET['id'];?>">
        <!-- 注意這邊要增加hidden id 因為是編輯 已有id了 -->
    </div>

</form>







