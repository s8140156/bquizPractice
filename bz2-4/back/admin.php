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
            $rows=$User->all();
            foreach ($rows as $row) {
                if ($row['acc'] !== 'admin') {
            ?>
                    <tr>
                        <td><?= $row['acc']; ?></td>
                        <td><?= str_repeat('*', mb_strlen($row['pw'])); ?></td>
                        <td><input type="checkbox" name="del[]" value="<?=$row['id'];?>"></td>
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