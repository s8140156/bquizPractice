<fieldset>
    <legend>帳號管理</legend>
    <form action="./api/edit_user.php" method="post">
        <table class="ct" style="margin:auto;width:55%">
            <tr>
                <td class="clo">帳號</td>
                <td class="clo">密碼</td>
                <td class="clo">刪除</td>
            </tr>
            <?php
            $rows=$User->all();
            foreach($rows as $row){
                if($row['acc']!=='admin'){
            ?>
            <tr>
                <td><?=$row['acc'];?></td>
                <td><?=str_repeat('*',mb_strlen($row['pw']));?></td>
                <td><input type="checkbox" name="del[]" value="<?$row['id'];?>"></td>
                <!-- 非常重要 checkbox是帶回資料庫的id所以是放在"value"傳回 不是給屬性id 目前發生寫成id=""造成sql無法辨識哪個id需刪除(我想根本沒傳回去因為也get不到) -->
            </tr>
            <?php
                  }
                }
            ?>
        </table>
        <div class="ct">
            <input type="submit" value="確定刪除">
            <input type="reset" value="清空選取">
        </div>
    </form>
    <h2>會員註冊</h2>
    <table>
        <span style="color:red">*請設定您要註冊的帳號及密碼(最長12個字元)</span>
        <tr>
            <td class="clo">step:登入帳號</td>
            <td><input type="text" name="acc" id="acc"></td>
        </tr>
        <tr>
            <td class="clo">step:登入密碼</td>
            <td><input type="password" name="pw" id="pw"></td>
        </tr>
        <tr>
            <td class="clo">step:再次確認密碼</td>
            <td><input type="password" name="pw2" id="pw2"></td>
        </tr>
        <tr>
            <td class="clo">step:信箱(忘記密碼時使用)</td>
            <td><input type="text" name="email" id="email"></td>
        </tr>
        <tr>
            <td><input type="button" value="註冊" onclick="reg()">
            <input type="button" value="清除" onclick="clean()"></td>
            <td></td>
        </tr>
    </table>
</fieldset>
<script>
    function reg(){
        let user={acc:$('#acc').val(),
                  pw:$('#pw').val(),
                  pw2:$('#pw2').val(),
                  email:$('#email').val(),
        };
        if(user.acc!='' && user.pw!='' && user.pw2!='' && user.email!=''){
            if(user.pw==user.pw2){
                $.post('./api/chk_acc.php',{acc:user.acc},(res)=>{
                    if(parseInt(res)==1){
                        alert('帳號重複')
                    }else{
                        $.post('./api/reg.php',user,(res)=>{
                            // alert('註冊完成，歡迎加入')
                            location.reload()
                        })
                    }
                })
            }else{
                alert('密碼錯誤')
            }

        }else{
            alert('不可空白')
        }
    }
</script>