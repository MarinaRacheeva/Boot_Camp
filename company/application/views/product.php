<?php 
require 'application/models/product.php';
require 'includes/template_header.php';
?>
<nav class="bread-crumbs-container product__bread-crumbs">
    <ul class="bread-crumbs">
        <? //вывод хлебных крошек для товара?>
        <li class="bread-crumb"><a class="bread-crumb__link" href="index.php">Главная</a></li>
        <li class="bread-crumb"><a class="bread-crumb__link" href="catalog.php">Каталог</a></li>
        <?if ($resp):      
            foreach ($resp as $prod):?>
                <?foreach ($res_cat as $row):?>
                    <li class="bread-crumb"><a class="bread-crumb__link" href="catalog.php?cat_id=<?=$row["id"]?>"><?=$row["name"]?></a></li>
                    <li class="bread-crumb bread-crumb_current"><?=$prod["name"]?></li>
                <?endforeach;?>
    </ul>
</nav> 
            <?//вывод товара?>                
                <section class="product">
                    <h1 class="product__info-block-part product__headline"><?=$prod["name"]?></h1>
                    <?if (file_exists($prod['image'])):?>
                        <img class="product__image" src="<?=$prod["image"]?>" alt="<?=$prod["name"]?>">
                    <?else:?>
                        <img class="product__image" src="img/category-none.jpg" alt="Упс! Здесь было фото сигареты, но теперь его нет :(">
                    <?endif;?>
                    <span class="good-price good_price product__info-block-part product__info-price"><?=$prod["price"]?><small class="good-price__currency"> руб.</small></span>
                    <article class="product__description">
                        <?=$prod["description"]?>
                    </article>
                </section>
            <?endforeach;?>
        <?endif;?>
<? require 'includes/template_footer.php' ?>