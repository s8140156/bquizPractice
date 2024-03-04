<?php
$good=$Goods->find($_GET['id']);
?>

<h2 class="ct"><?=$good['name'];?></h2>

<div class="item">
        <div class="img">
            <a href="?id=<?=$good['id'];?>">
                <img src="./img/<?= $good['img']; ?>" alt="" style="width:90%;height:200px">
            </a>
        </div>
        <div class="info">
            <div>分類：<?=$Type->find($good['big'])['name'];?> > <?=$Type->find($good['mid'])['name'];?></div>
            <div>編號：<?= $good['no'];?></div>
            <div>價錢：<?= $good['price'];?></div>
            <div>詳細說明：<?=$good['intro'];?></div>
            <div>庫存量：<?=$good['stock'];?></div>
        </div>
    </div>
    <div class="tt ct">
        購買數量：
        <input type="number" id="qt" value="1" style="width:50px">
        <img src="./icon/0402.jpg" onclick="buy()">
    </div>

