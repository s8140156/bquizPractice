<style>
    td>img,input,button{
        vertical-align: bottom;
    }
</style>
<h2>第一次購物</h2>
<img src="./icon/0413.jpg" onclick="location.href='?do=reg'">
<h2>會員登入</h2>
<table class="all">
    <tr>
        <td class="tt ct">帳號</td>
        <td class="pp"><input type="text" name="acc" id="acc"></td>
    </tr>
    <tr>
        <td class="tt ct">密碼</td>
        <td class="pp"><input type="password" name="pw" id="pw"></td>
    </tr>
    <tr>
        <td class="tt ct">驗證碼</td>
        <td class="pp">
            <input type="text" name="ans" id="ans">
            <img src="" id="captcha"><button onclick="captcha()">重新產生</button>
        </td>
    </tr>
</table>
<div class="ct"><button onclick="login('mem')">確認</button></div>
<script>
    captcha();
    function captcha(){
        $.get('./api/captcha.php',(img)=>{
            console.log(img)
            $('#captcha').attr("src",img)
        })
    }
    function login(table){
        $.get('./api/chk_ans.php',{ans:$('#ans').val()},(res)=>{
            if(parseInt(res)==0){
                alert('驗證碼錯誤，請重新輸入')
            }else{
                $.post('./api/chk_pw.php',{table,acc:$('#acc').val(),pw:$('#pw').val()},(res)=>{
                    if(parseInt(res)==0){
                        alert('帳號或密碼錯錯，請重新輸入')
                    }else{
                        location.href="index.php"
                    }
                })
            }
        })
    }
</script>