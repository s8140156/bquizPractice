<fieldset>
    <legend>新增問卷</legend>
    <form action="./api/add_que.php" method="post">
        <div>問卷名稱
            <input type="text" name="subject" id="">
        </div>
        <div class="clo">
            <div id="opt">選項
                <input type="text" name="option[]" id="">
                <input type="button" value="更多" onclick="more()">
            </div>
        </div>
        <div>
            <input type="submit" value="新增">|<input type="reset" value="清空">
        </div>
    </form>
</fieldset>
<script>
    function more() {
        let text = `
        <div>選項
            <input type="text" name="option[]" id="">
        </div>`;
        $('#opt').after(text)

    }
</script>