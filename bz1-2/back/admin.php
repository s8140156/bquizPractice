<div style="width:99%; height:87%; margin:auto; overflow:auto; border:#666 1px solid;">
    <p class="t cent botli">管理者帳號管理</p>
    <form method="post" action="./api/edit.php"><!--注意要改成api路徑 還有target=back刪掉-->
        <table width="100%">
            <tbody>
                <tr class="yel">
                    <td width="45%">帳號</td>
                    <td width="45%">密碼</td>
                    <!-- <td width="7%">顯示</td> -->
                    <td width="10%">刪除</td>
                    <!-- <td></td> -->
                </tr>
                <?php
                $rows=$DB->all();
                foreach($rows as $row){
                ?>
                <tr class="cent">
                    <td width="23%"><input type="text" name="acc[]" style="width:90%" value="<?=$row['acc'];?>"></td>
                    <td width="23%"><input type="password" name="pw[]" style="width:90%" value="<?=$row['pw'];?>"></td>
                    <td width="7%"><input type="checkbox" name="del[]" value="<?=$row['id'];?>"></td>
                    <td><!--下面修改重要!! 更新圖片要增加op function注意路徑是在modal/upload.php並網路傳值帶table及id-->
                        <!-- 務必記得要增加hidden id欄位 -->
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
                    <td width="200px"><input type="button" onclick="op('#cover','#cvr','./modal/<?=$do;?>.php?table=<?=$do;?>')" value="新增管理者帳號"></td>
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