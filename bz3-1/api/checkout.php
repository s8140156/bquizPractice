<?php

include_once "db.php";

sort($_POST['seats']); 
//使用sort()是將seats裡面座位號碼先做排序(會影響裡面內容變動)
// call by reference 無論在程式的任何地方使用到該變數，會將該變數在記憶體中的 address 傳給程式使用，所以使用變數的地方都會指向同一塊記憶體。
// 一旦更動變數時，使用該變數的地方的值都會跟著改變 sort()函式屬於有"&"$array
$_POST['seats']=serialize($_POST['seats']);
$id=$Order->max('id')+1; //目前尚未有id產生,可以以這個方式取得並存入id(找出資料表裡最大的id+1)
$_POST['no']=date("Ymd").sprintf("%04d",$id);
$Order->save($_POST);
echo $_POST['no']; //回傳前端需要的no

?>