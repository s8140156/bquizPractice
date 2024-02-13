<div class="di" style="height:540px; border:#999 1px solid; width:76.5%; margin:2px 0px 0px 0px; float:left; position:relative; left:20px;">
    <!--正中央-->
    <table width="100%">
        <tbody>
            <tr>
                <td style="width:70%;font-weight:800; border:#333 1px solid; border-radius:3px;" class="cent"><a href="?do=admin" style="color:#000; text-decoration:none;">後台管理區</a></td>
                <!-- <td><button onclick="document.cookie=&#39;user=&#39;;location.replace(&#39;?&#39;)" style="width:99%; margin-right:2px; height:50px;">管理登出</button></td> -->
                <td><button onclick="location.href='./api/logout.php'" style="width:99%; margin-right:2px; height:50px;">管理登出</button></td> <!--這邊改成連結至api/logout by session方式-->
            </tr>
        </tbody>
    </table>
    <div style="width:99%; height:87%; margin:auto; overflow:auto; border:#666 1px solid;">
        <p class="t cent botli">網站標題管理</p>
        <form method="post" action="./api/edit.php"> <!--這邊要修改到api的路徑 增edit.php 不用target-->
            <table width="100%" class="cent">
                <tbody>
                    <tr class="yel">
                        <td width="45%">網站標題</td>
                        <td width="23%">替代文字</td>
                        <td width="7%">顯示</td>
                        <td width="7%">刪除</td>
                        <td></td>
                    </tr>
                    <tr>
                        <!-- 以下表格是新增的 是後台資料回來格式 注意不需要id但要放value(放資料) --> 
                    <td width="45%"><img src="./upload/" style="width:300px;height:30px"></td>
                        <td width="23%"><input type="text" name="text[]" value=""></td>
                        <td width="7%"><input type="radio" name="sh" value=""></td>
                        <td width="7%"><input type="checkbox" name="del[]" value=""></td>
                        <td>
                            <input type="button" value="更新圖片" onclick="op('#cover','#cvr','./modal/upload.php?table=<?=$do;?>&id=<?=$row['id'];?>')"> <!--這邊要加上js op函式-->
                            <input type="hidden" name="id[]" value=""> <!--重要 表格記得都要帶個hidden id欄位-->
                        </td>
                    </tr>
                </tbody>
            </table>
            <table style="margin-top:40px; width:70%;">
                <tbody>
                    <tr>
                        <!-- 這邊非常重要 要把彈出視窗的連結改成連結網址參數取代輸入檔名 還需要帶上table參數 以利不同的功能網站串連 -->
                        <td width="200px"><input type="button" onclick="op('#cover','#cvr','./modal/<?=$do;?>.php?table=<?=$do;?>')" value="新增網站標題圖片"></td>
                        <td class="cent">
                            <input type="hidden" name="table" value="table">
                            <input type="submit" value="修改確定">
                            <input type="reset" value="重置">
                        </td>
                    </tr>
                </tbody>
            </table>
        </form>
    </div>
</div>