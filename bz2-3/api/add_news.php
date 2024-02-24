<?php

include_once "db.php";

if(isset($_POST)){
    $News->save(['title'=>$_POST['title'],
                  'news'=>$_POST['news'],
                  'type'=>$_POST['type'],
                    'sh'=>1,
                  'good'=>0]);
}

to("../back.php?do=news");


?>