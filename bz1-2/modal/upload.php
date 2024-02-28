<?php
switch($_GET['table']){
    case 'title':
        echo "<h3 class='cent'>更新網站標題區圖片</h3>";
    break;
    case 'mivm':
        echo "<h3 class='cent'>更新動畫圖片</h3>";
    break;
    case 'image':
        echo "<h3 class='cent'>更新校園映像圖片</h3>";
    break;
}
?>
<hr>
<form action="./api/upload.php" method="post" enctype="multipart/form-data">
    <table style="margin:auto;width:70%">
        <tr>
        <?php
        switch($_GET['table']){
        case 'title':
            echo "<td>標題區圖片</td>";
        break;
        case 'mivm':
            echo "<td>動畫圖片</td>";
        break;
        case 'image':
            echo "<td>校園映像圖片</td>";
        break;
        }
        ?>
            <td><input type="file" name="img"></td>
        </tr>
    </table>
    <div class="cent">
        <input type="submit" value="更新">
        <input type="reset" value="重置">
        <input type="hidden" name="table" value="<?=$_GET['table'];?>">
        <input type="hidden" name="id" value="<?=$_GET['id'];?>">
    </div>
</form>