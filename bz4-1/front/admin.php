<h2 class="ct">管理員登入</h2>
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
            <?php
            $a=rand(10,99);
            $b=rand(10,99);
            $_SESSION['ans']=$a+$b;
            echo "{$a}+{$b}=";
            ?>
            <input type="text" name="ans" id="ans">
        </td>
    </tr>
</table>
<div class="ct"><button onclick="login('admin')">確認</button></div>
<script>
    function login(table){
        $.get('./api/chk_ans.php',{ans:$('#ans').val()},(res)=>{
            if(parseInt(res)==0){
                alert('驗證碼錯誤，請重新輸入')
            }else{
                $.post('./api/chk_pw.php',{table,acc:$('#acc').val(),pw:$('#pw').val()},(res)=>{
                    if(parseInt(res)==0){
                        alert('帳號或密碼錯錯，請重新輸入')
                    }else{
                        location.href="back.php"
                    }
                })
            }
        })
    }
</script>
<?php
//測試寫入功能寫法
// $admin['acc']='test';
// $admin['pw']='1234';
// $admin['pr']=serialize([1,2,3]);
// $Admin->save($admin);

?>