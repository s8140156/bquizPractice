<fieldset>
    <legend>帳號管理</legend>
    <form action="./api/user_edit.php" method="post">
        <table style="width:95%;margin:auto;text-align:center">
            <tr>
                <td class="clo">帳號</td>
                <td class="clo">密碼</td>
                <td class="clo">刪除</td>
            </tr>
            <?php
            $rows = $User->all();
            foreach ($rows as $row) {
                if ($row['acc'] !== 'admin') {
            ?>
                    <tr>
                        <td><?= $row['acc']; ?></td>
                        <td><?= str_repeat('*', mb_strlen($row['pw'])); ?></td>
                        <td><input type="checkbox" name="del[]" value="<?= $row['id']; ?>"></td>
                    </tr>
            <?php
                }
            }
            ?>

        </table>
        <div class="ct">
            <input type="submit" value="確定刪除"><input type="reset" value="清空選取">
        </div>
    </form>
</fieldset>
<h2>會員註冊</h2>
<table>
    <span style="color:red">*請設定您要註冊的帳號及密碼(最長12個字元)</span>
    <tr>
        <td class="clo">帳號:</td>
        <td><input type="text" name="acc" id="acc"></td>
    </tr>
    <tr>
        <td class="clo">密碼:</td>
        <td><input type="password" name="pw" id="pw"></td>
    </tr>
    <tr>
        <td class="clo">確認密碼:</td>
        <td><input type="password" name="pw2" id="pw2"></td>
    </tr>
    <tr>
        <td class="clo">信箱:</td>
        <td><input type="text" name="email" id="email"></td>
    </tr>
    <tr>
        <td>
            <input type="button" value="註冊" onclick="reg()"><input type="button" value="清除" onclick="clean()">
            <!--ㄟ發現要讓jq button生效 需要在table裡面才行 剛發現login clean在table內 reg在table外 這樣會導致兩個clean功能都不能使用-->
        </td>
    </tr>
</table>
<script>
    function reg() {
        let user = {
            acc: $('#acc').val(),
            pw: $('#pw').val(),
            pw2: $('#pw2').val(),
            email: $('#email').val(),
        };
        if (user.acc != '' && user.pw != '' && user.pw2 != '' && user.email != '') {
            if (user.pw == user.pw2) {
                $.post('./api/chk_acc.php', {
                    acc: user.acc
                }, (res) => {
                    if (parseInt(res) == 1) {
                        alert('帳號重覆')
                    } else {
                        $.post('./api/reg.php', user, (res) => {
                            // alert('註冊完成，歡迎登入')
                            location.reload();
                        })
                    }
                })
            } else {
                alert('密碼錯誤')
            }
        } else {
            alert('不可空白')
        }

    }
</script>