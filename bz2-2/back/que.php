<fieldset>
    <legend>新增問卷</legend>
    <form action="./api/add_que.php" method="post">
        <div style="display:flex">
            <div>問卷名稱</div>
            <div><input type="text" name="subject"></div>
        </div>
        <div>
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

<fieldset>
    <legend>問卷列表</legend>
    <table style="width:95%;margin:auto;text-align:center">
        <tr>
            <td width="60%" class="clo">問卷名稱</td>
            <td width="20%" class="clo">投票數</td>
            <td width="20%" class="clo">開放</td>
        </tr>
        <?php
        $ques=$Que->all(['subject_id'=>0]);
        foreach($ques as $key=>$que){
        ?>
        <tr>
            <td><?=$que['text'];?></td>
            <td><?=$que['vote'];?></td>
            <td><button><a style="text-decoration:none;color:black" href="./api/show.php?id=<?=$que['id'];?>"><?=($que['sh']==1)?'開放':'隱藏';?></a></button></td>
        </tr>
        <?php     }
        ?>
    </table>
</fieldset>
<script>
    function more(){
        let opt=`
            <div id="opt">選項
                <input type="text" name="option[]">
            </div>
        `;
        $('#opt').before(opt);
    }
</script>