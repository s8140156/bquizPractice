<?php

include_once "db.php";

if(isset($_POST['subject'])){
    $Que->save(['text'=>$_POST['subject'],
                'vote'=>0,
                'subject_id'=>0,
                'sh'=>1]);
    $subject_id=$Que->find(['text'=>$_POST['subject']])['id'];
}
if(isset($_POST['option'])){ //option帶進來的是陣列 請記得要用foreach先取出
    foreach($_POST['option'] as $option){
        $Que->save(['text'=>$option,
                    'vote'=>0,
                    'subject_id'=>$subject_id,
                    'sh'=>1]);
    }
}

to("../back.php?do=que");



?>