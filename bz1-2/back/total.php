<div style="width:99%; height:87%; margin:auto; overflow:auto; border:#666 1px solid;">
    <p class="t cent botli">進站總人數管理</p>
    <form method="post" action="./api/edit_info.php"><!--total與bottom的只有修改沒有新增使用edit_info-->
        <table width="100%">
            <tbody>
                <tr class="yel">
                    <td width="50%" >進站總人數:</td>
                    <td width="50%"><input type="number" name="total" value="<?=$Total->find(5)['total'];?>"></td>
					<!-- ㄟ這邊要注意進站人數輸入的是數字 欄位名(name)是total -->

                </tr>
            </tbody>
        </table>
        <table style="margin-top:40px; width:70%;">
            <tbody>
                <tr>
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