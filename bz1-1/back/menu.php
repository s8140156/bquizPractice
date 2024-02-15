<div style="width:99%; height:87%; margin:auto; overflow:auto; border:#666 1px solid;">
    <p class="t cent botli">選單管理</p>
    <form method="post" action="./api/edit.php"> <!--這邊要修改到api的路徑 增edit.php 不用target-->
        <table width="100%" class="cent">
            <tbody>
                <tr class="yel">
                    <td width="27%">主選單名稱</td>
                    <td width="27%">選單連結網址</td>
                    <td width="10%">次選單數</td>
                    <td width="10%">顯示</td>
                    <td width="10%">刪除</td>
                    <td width="10%"></td>
                </tr>
                <?php
                $rows=$DB->all(['menu_id'=>0]);
                foreach($rows as $row){
                ?>
                <tr>
                    <!-- 以下表格是新增的 是後台資料回來格式 注意不需要id但要放value(放資料) --> 
                    <td>
                        <input type="text" name="text[]" value="<?=$row['text'];?>">
                    </td>
                    <td>
                        <input type="text" name="href[]" value="<?=$row['href'];?>">
                        <input type="hidden" name="id[]" value="<?=$row['id'];?>"> <!--重要 表格記得都要帶個hidden id欄位-->
                    </td>
                    <td>
                        <?=$Menu->count(['menu_id'=>$row['id']]);?>
                    </td>
                    <td><input type="checkbox" name="sh[]" value="<?=$row['id'];?>"<?=($row['sh']==1)?'checked':'';?>></td>
                    <td><input type="checkbox" name="del[]" value="<?=$row['id'];?>"></td>
                    <td>
                        <input type="button" value="編輯次選單" onclick="op('#cover','#cvr','./modal/submenu.php?table=<?=$do;?>&id=<?=$row['id'];?>')"> <!--次選單路徑是單獨的modal/submenu-->
                    </td>
                </tr>
                <?php } ?>
            </tbody>
        </table>
        <table style="margin-top:40px; width:70%;">
            <tbody>
                <tr>
                    <input type="hidden" name="table" value="<?=$do;?>"> <!--這邊要注意hidden value要帶傳回來的$do-->
                    <!-- 這邊非常重要 要把彈出視窗的連結改成連結網址參數取代輸入檔名 還需要帶上table參數 以利不同的功能網站串連 -->
                    <td width="200px"><input type="button" onclick="op('#cover','#cvr','./modal/<?=$do;?>.php?table=<?=$do;?>')" value="新增主選單"></td>
                    <td class="cent">
                        <input type="submit" value="修改確定">
                        <input type="reset" value="重置">
                    </td>
                </tr>
            </tbody>
        </table>
    </form>
</div>