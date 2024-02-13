<?php
switch($_GET['table']){
    case 'title':
        echo "<h3 class='cent'>更新標題區圖片</h3>";
    break;
    case 'mvim':
        echo "<h3 class='cent'>更新動畫圖片</h3>";
    break;
    case 'imgae':
        echo "<h3 class='cent'>更新校園映像圖片</h3>";
    break;
}
?>
<hr>
<form action="./api/upload.php" method="post" enctype="multipart/form-data">
    <table style="margin:auto">
        <tr>
            <?php
            switch($_GET['table']){
                case 'title':
                    echo "<td>標題區圖片</td>";
                break;
                case 'mvim':
                    echo "<td>動畫圖片</td>";
                break;
                case 'imgae':
                    echo "<td>校園映像圖片</td>";
                break;
            }
            ?>
            <td><input type="file" name="img" id=""></td>
        </tr>
    </table>
    <div class="cent">
        <!--注意要加hidden欄位 接收從back/title按下"更新"圖片時 傳來的table&id參數；還有這是給有更新圖片使用的各種功能共用-->
        <input type="hidden" name="table" value="<?=$_GET['table'];?>"> 
        <input type="hidden" name="id" value="<?=$_GET['id'];?>"> 
        <input type="submit" value="新增">
        <input type="reset" value="重置">
    </div>
</form>
