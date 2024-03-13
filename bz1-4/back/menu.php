<div style="width:99%; height:87%; margin:auto; overflow:auto; border:#666 1px solid;">
    <p class="t cent botli">選單管理</p>
    <form method="post" action="./api/edit.php">
        <table width="100%">
            <tbody>
                <tr class="yel">
                    <td width="45%">主選單名稱</td>
                    <td width="23%">選單連結網址</td>
                    <td width="23%">次選單數</td>
                    <td width="7%">顯示</td>
                    <td width="7%">刪除</td>
                    <td></td>
                </tr>
                <?php
                $rows=$DB->all(['menu_id'=>0]);
                foreach($rows as $row){
                ?>
                <tr>
                    <td width="23%"><input type="text" name="text[]" value="<?=$row['text'];?>"></td>
                    <td width="23%"><input type="text" name="href[]" value="<?=$row['href'];?>"></td>
                    <td width="23%"><?=$DB->count(['menu_id'=>$row['id']]);?></td>
                    <td width="7%"><input type="checkbox" name="sh[]" value="<?=$row['id'];?>" <?=($row['sh']==1)?'checked':'';?>></td>
                    <td width="7%">
                        <input type="checkbox" name="del[]" value="<?=$row['id'];?>">
                        <input type="hidden" name="id[]" value="<?=$row['id'];?>">
                    </td>
                    <td>
                        <input type="button" value="編輯次選單" onclick="op('#cover','#cvr','./modal/submenu.php?table=<?=$do;?>&id=<?=$row['id'];?>')">
                    </td>
                </tr>
                <?php } ?>
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

                    </td>
                </tr>
            </tbody>
        </table>

    </form>
</div>