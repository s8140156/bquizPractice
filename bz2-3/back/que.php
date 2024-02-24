<fieldset>
    <legend>問卷管理</legend>
    <form action="./api/add_que.php" method="post">
        <div style="display:flex;margin:3px">
            <div class="clo">問卷名稱</div>
            <div><input type="text" name="subject" id=""></div>
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
<fieldset>
    <legend>問卷列表</legend>
    <table style="width:90%;margin:auto">
        <tr>
            <td class="clo" width="70%">問卷名稱</td>
            <td class="clo" width="15%">投票數</td>
            <td class="clo" width="15%">開放</td>
        </tr>
        <?php
        $ques=$Que->all(['subject_id'=>0]);
        foreach($ques as $idx=>$que){
        ?>
        <tr>
            <td><?=$idx+1;?>. <?=$que['text'];?></td>
            <td><?=$que['vote'];?></td>
            <td><button><a style="text-decoration:none;color:black" href="./api/show.php?id=<?=$que['id'];?>"><?=($que['sh']==1)?'開放':'關閉';?></a></button>

            </td>
            <!-- <td></td> -->
        </tr>
        <?php  }
        ?>
    </table>
</fieldset>
<script>
    function more(){
        let opt=`
        <div id="opt">選項
            <input type="text" name="option[]" id="">
        </div>`
        $('#opt').before(opt)
    }
</script>