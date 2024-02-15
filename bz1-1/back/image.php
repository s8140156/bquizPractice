<style>
    .cent > a{
        text-decoration: none;
    }
</style>
<div style="width:99%; height:87%; margin:auto; overflow:auto; border:#666 1px solid;">
    <p class="t cent botli">校園映像管理</p>
    <form method="post" action="./api/edit.php"> <!--這邊要修改到api的路徑 增edit.php 不用target-->
        <table width="100%">
            <tbody>
                <tr class="yel">
                    <td width="70%">校園映像資料圖片</td>
                    <td width="10%">顯示</td>
                    <td width="10%">刪除</td>
                    <td></td>
                </tr>
                <?php
                $total=$DB->count();
                $div=3;
                $pages=ceil($total/$div);
                $now=$_GET['p']??1;
                $start=($now-1)*$div;
                $rows=$DB->all(" limit $start,$div");
                foreach($rows as $row){
                ?>
                    <tr>
                        <!-- 以下表格是新增的 是後台資料回來格式 注意不需要id但要放value(放資料) -->
                        <td>
                            <img src="./img/<?= $row['img']; ?>" style="width:100px;height:68px">
                            <input type="hidden" name="id[]" value="<?= $row['id']; ?>"> <!--重要 表格記得都要帶個hidden id欄位-->
                        </td>
                        <td><input type="checkbox" name="sh[]" value="<?= $row['id']; ?>" <?= ($row['sh'] == 1) ? 'checked' : ''; ?>></td>
                        <td><input type="checkbox" name="del[]" value="<?= $row['id']; ?>"></td>
                        <td>
                            <input type="button" value="更換動畫" onclick="op('#cover','#cvr','./modal/upload.php?table=<?=$do;?>&id=<?=$row['id'];?>')"> <!--這邊要加上js op函式-->
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
        <div class="cent">
            <?php
            if($now-1>0){
                $prev=$now-1;
                echo "<a href='?do=$do&p=$prev'> < </a>";
            }
            for($i=1;$i<=$pages;$i++){
                $size=($now==$i)?'font-size:22px':'font-size:16px';
                echo "<a href='?do=$do&p=$i' style='$size'> $i </a>";

            }
            if($now<=$pages){
                $next=$now+1;
                echo "<a href='?do=$do&p=$next'> > </a>";
            }
            ?>
        </div>
        <table style="margin-top:40px; width:70%;">
            <tbody>
                <tr>
                    <input type="hidden" name="table" value="<?= $do; ?>"> <!--這邊要注意hidden value要帶傳回來的$do-->
                    <!-- 這邊非常重要 要把彈出視窗的連結改成連結網址參數取代輸入檔名 還需要帶上table參數 以利不同的功能網站串連 -->
                    <td width="200px"><input type="button" onclick="op('#cover','#cvr','./modal/<?= $do; ?>.php?table=<?= $do; ?>')" value="新增校園映像圖片"></td>
                    <td class="cent">
                        <input type="submit" value="修改確定">
                        <input type="reset" value="重置">
                    </td>
                </tr>
            </tbody>
        </table>
    </form>
</div>