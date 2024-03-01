<div style="width:99%; height:87%; margin:auto; overflow:auto; border:#666 1px solid;">
    <p class="t cent botli">頁尾版權資料管理</p>
    <form method="post" action="./api/edit_info.php"><!--total與bottom的只有修改沒有新增使用edit_info-->
        <table width="100%">
            <tbody>
                <tr class="yel">
                    <td width="50%" >頁尾版權資料:</td>
                    <td width="50%"><input type="text" name="bottom" value="<?=$Bottom->find(5)['bottom'];?>"></td>
                    <!-- 這邊也是注意欄位名字 -->

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