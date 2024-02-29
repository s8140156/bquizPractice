<div style="width:99%; height:87%; margin:auto; overflow:auto; border:#666 1px solid;">
    <p class="t cent botli">選單管理</p>
    <form method="post" action="./api/edit.php"><!--注意要改成api路徑 還有target=back刪掉-->
        <table width="100%">
            <tbody>
                <tr class="yel">
                    <td width="35%">主選單名稱</td>
                    <td width="35%">選單連結網址</td>
                    <td width="10%">次選單數</td>
                    <td width="10%">顯示</td>
                    <td width="10%">刪除</td>
                    <td></td>
                </tr>
                <?php
                $rows=$DB->all();
                foreach($rows as $row){
                ?>
                <tr class="cent">
                    <td><input type="text" name="text[]" value="<?=$row['text'];?>" style="width:90%"></td>
                    <td><input type="text" name="href[]" value="<?=$row['href'];?>" style="width:90%"></td>
                    <td><?=$Menu->count(['menu_id'=>$row['id']]);?></td>
                    <td><input type="checkbox" name="sh[]" value="<?=$row['id'];?>"<?=($row['sh']==1)?'checked':'';?>></td>
                    <td><input type="checkbox" name="del[]" value="<?=$row['id'];?>"></td>
                    <td><!--下面修改重要!! 更新圖片要增加op function注意路徑是在modal/upload.php並網路傳值帶table及id-->
                        <!-- 務必記得要增加hidden id欄位 -->
                        <input type="button" value="編輯次選單" onclick="op('#cover','#cvr','./modal/submenu.php?table=<?=$do;?>&id=<?=$row['id'];?>')">
                        <input type="hidden" name="id[]" value="<?=$row['id'];?>">
                    </td>
                </tr>
                <?php      }
                ?>
            </tbody>
        </table>
        <table style="margin-top:40px; width:70%;">
            <tbody>
                <tr>
                    <td width="200px"><input type="button" onclick="op('#cover','#cvr','./modal/<?=$do;?>.php?table=<?=$do;?>')" value="新增主選單"></td>
                    <td class="cent">
                        <input type="submit" value="修改確定">
                        <input type="reset" value="重置">
                        <input type="hidden" name="table" value="<?=$do;?>">
                        <!-- 這邊注意!!要增加帶hidden table欄位 name&value都是table -->
                    </td>
                </tr>
            </tbody>
        </table>
    </form>
</div>