<h2 class="ct">會員註冊</h2>
<table class="all">
    <tr>
        <td class="tt ct">姓名</td>
        <td class="pp"><input type="text" name="name" id="name"></td>
    </tr>
    <tr>
        <td class="tt ct">帳號</td>
        <td class="pp"><input type="text" name="acc" id="acc">
        <button onclick="chkacc()">檢測帳號</button>
    </td>
    </tr>
    <tr>
        <td class="tt ct">密碼</td>
        <td class="pp"><input type="text" name="pw" id="pw"></td>
    </tr>
    <tr>
        <td class="tt ct">電話</td>
        <td class="pp"><input type="text" name="tel" id="tel"></td>
    </tr>
    <tr>
        <td class="tt ct">住址</td>
        <td class="pp"><input type="text" name="addr" id="addr"></td>
    </tr>
    <tr>
        <td class="tt ct">電子信箱</td>
        <td class="pp"><input type="text" name="email" id="email"></td>
    </tr>
</table>
<div class="ct">
    <button onclick="reg()">註冊</button> |
    <button onclick="clean()">重置</button>
</div>
<script>
    function chkacc(){
        let acc=$('#acc').val();
        $.get('./api/chk_acc.php',{acc},(res)=>{
            if(parseInt(res)==1 || acc=='admin'){
                alert(`此帳號${acc}已被使用`) //這邊要注意 使用上引號包住字串 因為裡面有變數要使用
            }else{
                alert(`此帳號${acc}可使用`)
            }
        })
    }
    function reg(){
        let user={
            name:$('#name').val(),
            acc:$('#acc').val(),
            pw:$('#pw').val(),
            tel:$('#tel').val(),
            addr:$('#addr').val(),
            email:$('#email').val(),
        };
        $.get('./api/chk_acc.php',{acc:user.acc},(res)=>{
            if(parseInt(res)==1 || user.acc=='admin'){
                alert(`此帳號${user.acc}已被使用`)
            }else{
                $.post('./api/reg.php',user,()=>{
                    alert('註冊成功，歡迎加入')
                    location.href="?do=login" //註冊完後應該去會員登入頁準備登入
                })
            }
        })
    }
</script>