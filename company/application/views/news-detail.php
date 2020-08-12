<?php 
require 'application/models/news-detail.php'; 
require 'includes/template_header.php';
?>
<nav class="bread-crumbs-container product__bread-crumbs">
    <ul class="bread-crumbs">
        <?//вывод "хлебных крошек" и новости
        if ($news):
            foreach ($news as $new):?>
        <li class="bread-crumb"><a class="bread-crumb__link" href="index.php">Главная</a></li>
        <li class="bread-crumb"><a class="bread-crumb__link" href="news.php">Новости</a></li>
        <li class="bread-crumb bread-crumb_current"><?=$new["header"]?></li>
    </ul>
</nav>
<article class="shipment-article">
    <p><b><?=$new["date"]?></b></p>
    <h1><?=$new["header"]?></h1>
    <p>
        <?=$new["description"]?>
    </p>
</article>
            <?endforeach;?>
        <?endif;?>
<? require 'includes/template_footer.php' ?>