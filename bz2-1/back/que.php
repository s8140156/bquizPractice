<fieldset>
    <legend>新增問卷</legend>
    <form action="./api/add_que.php" method="post">
        <div>
            <div>問卷名稱
                <input type="text" name="subject">
            </div>
        </div>
        <div class="clo">
            <div id="opt">選項
                <input type="text" name="option[]">
                <input type="button" value="更多" onclick="more()">
            </div>
        </div>
        <div>
            <input type="submit" value="新增">|<input type="reset" value="清空">
        </div>
    </form>
</fieldset>
<script>
    function more(){
        let opt=`
        <div id="opt">選項
                <input type="text" name="option[]">
        </div>`;
        $('#opt').before(opt);
    }
</script>