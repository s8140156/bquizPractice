<fieldset>
    <legend>新增問卷</legend>
    <form action="./api/add_que.php" method="post">
        <table>
            <div>
                <div>問卷名稱</div>
                <div><input type="text" name="subject" id=""></div>
            </div>
            <div class="clo">
                <div id="opt">選項
                    <input type="text" name="option[]" id="">
                    <input type="button" value="更多" onclick="more()">
                </div>
            </div>
            <div><input type="submit" value="新增">|<input type="reset" value="清空"></div>
        </table>
    </form>
</fieldset>
<script>
    function more(){
        let opt=`
            <div>選項
                <input type="text" name="option[]" id="">
            </div>`;
        $('#opt').after(opt);
    }
</script>