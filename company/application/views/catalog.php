<?php 
require 'application/models/catalog.php';
require 'includes/template_header.php';?>
    <h1 class="invisible">Каталог товаров</h1> 
    <?//вывод "хебных крошек"?>
    <nav class="bread-crumbs-container">
        <ul class="bread-crumbs">
            <li class="bread-crumb"><a class="bread-crumb__link" href="index.php">Главная</a></li>
            <li class="bread-crumb"><a class="bread-crumb__link" href="catalog.php">Каталог</a></li>
    <?if ($products):
        if ($_GET['cat_id']):
            foreach ($crumbs as $cat):?>
            <li class="bread-crumb bread-crumb_current"><?=$cat["name"]?></li>
            <?endforeach;?>
        <?endif;?>
        </ul>
    </nav>
    <form class="search-filter" id="catalog-page__search-filter-1" method="GET" action="<?=$_SERVER['REQUEST_URI']?>">
        <span class="search-filter__item">
        <?foreach ($crumbs as $cat):?>
            <input type="hidden" name="cat_id" value="<?=$cat['id']?>">
        <?endforeach;?>
            <label class="search-filter__label" for="cost-from">Цена</label>
            <input class="search-filter__input" step="0.01" type="number" min="0" name="cost-from" id="cost-from"
                placeholder="от" value="<?=$_GET['cost-from']?>">
        </span>
        <span class="search-filter__item">
            <label class="search-filter__label" for="cost-to">—</label>
            <input class="search-filter__input" type="number" min="0" name="cost-to" id="cost-to" placeholder="до" value="<?=$_GET['cost-to']?>">
        </span>
        <input class="form-submit search-filter__apply" type="submit" value="Применить">
    </form>
    <? //вывод количества найденных товаров по фильтру цены
        if ($_GET["cost-from"] || $_GET["cost-to"]):
            if ($pr_kol == '0'):?>
                <p> По вашему запросу товаров не найдено :( </p>
            <?else:
                $ost = $pr_kol % 10;
                if ($ost == 1) $tov = ' товар';
                elseif (($ost == 2) || ($ost == 3) || ($ost == 4)) $tov = ' товара';
                else $tov = ' товаров';?>
            <?endif;?>
            <p> По вашему запросу найдено <?=$pr_kol . $tov?></p>
        <?endif;
        //вывод товаров?>
        <ul class="categories categories__reposition">
        <?foreach ($products as $product):?>
            <li class="category good-piece">
            <?if ($_GET["cat_id"]):?>
                <a class="category__link" href="product.php?id=<?=$product["id"]?>&cat_id=<?=$product["category_id"]?>">
            <?else:?>
                <a class="category__link" href="product.php?id=<?=$product["id"]?>">
            <?endif;?>
            <?if (file_exists($product['image'])):?>
                <img class="category__image good__image" src="<?=$product["image"]?>" alt="<?=$product["name"]?>">
            <?else:?>
                <img class="category__image good__image" src="img/category-none.jpg" alt="<?=$product["name"]?>">
            <?endif;?>
                <span class="category__name-container good_name"><span class="category__name-inner"><?=$product["name"]?></span></span>
                </a>
                <span class="good-price good_price"><?=$product["price"]?><small class="good-price__currency"> руб.</small></span>
            </li>
        <?endforeach;?>
    <?endif;?>
    </ul>   
    <ul class="paginator catalog-page__paginator">
    <?//постраничная навигация по товарам
    if ($kol_page > 1):
        for ($i = 1; $i <= $kol_page; $i++):
            if ($i == $active):?>
                <li class="paginator__elem paginator__elem_current"><span class="paginator__link"><?=$i?></span></li>
            <?else:?>
                <li class="paginator__elem"><a href=catalog.php<?=$q.$i?>><?=$i?></a></li>
            <?endif;?>
        <?endfor;?>
        <?if ($active != $kol_page):?>
            <li class="paginator__elem paginator__elem_next"><a href="<?=$q.$next?>" class="paginator__link">Следующая страница</a></li>
        <?else:?>
            <li class="hidden paginator__elem paginator__elem_next"><span class="paginator__link">Следующая страница</span></li>
        <?endif;?>
    <?endif;?>
    </ul>
<? require 'includes/template_footer.php' ?>