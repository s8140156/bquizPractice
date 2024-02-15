<?php

include_once "db.php";

$table=$_POST['table'];
$DB=${ucfirst($table)};
unset($_POST['table']);

foreach($_POST['id'] as $key=>$id){
    if(isset($_POST['del']) && in_array($id,$_POST['del'])){
        $DB->del($id);
    }else{
        $row=$DB->find($id);
        if(isset($row['text'])){
            $row['text']=$_POST['text'][$key]; //這邊有ad,news ; mvim,image=>沒有text欄位;total,bottom沒有"text欄位"是獨立處理
        }
        switch($table){
            case 'title':
                $row['sh']=(isset($_POST['sh']) && $_POST['sh']==$id)?1:0;
            break;
            case 'admin':
                $row['acc']=$_POST['acc'][$key];
                $row['pw']=$_POST['pw'][$key];
            break;
            case 'menu':
                $row['href']=$_POST['href'][$key];
                $row['sh']=(isset($_POST['sh']) && in_array($id,$_POST['sh']))?1:0;
            break;
            default:
                $row['sh']=(isset($_POST['sh']) && in_array($id,$_POST['sh']))?1:0; //其他資料表都有sh欄位
        }
        $DB->save($row);

    }
}

to("../back.php?do=$table");


?>