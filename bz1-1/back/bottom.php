<div style="width:99%; height:87%; margin:auto; overflow:auto; border:#666 1px solid;">
    <p class="t cent botli">頁尾版權資料管理</p>
    <form method="post" action="./api/edit_info.php"> <!--這邊要修改到api的路徑 增edit_info.php 因為與其他功能格式有異-->
        <table width="100%" style="text-align:center">
            <tbody>
                <tr class="yel">
                    <td width="50%">頁尾版權資料：</td>
                    <td width="50%">
                        <input type="text" name="bottom" value="<?=$Bottom->find(1)['bottom'];?>">
                        <!-- <input type="hidden" name="table" value="<?=$do;?>"> -->
                    </td>

                    <!-- <td></td> -->
                </tr>
            </tbody>
        </table>
        <table style="margin-top:40px; width:70%;">
            <tbody>
                <tr>
                    <input type="hidden" name="table" value="<?=$do;?>"> <!--這邊要注意hidden value要帶傳回來的$do-->
                    <!-- 這邊非常重要 要把彈出視窗的連結改成連結網址參數取代輸入檔名 還需要帶上table參數 以利不同的功能網站串連 -->
                    <td class="cent">
                        <input type="submit" value="修改確定">
                        <input type="reset" value="重置">
                    </td>
                </tr>
            </tbody>
        </table>
    </form>
</div>