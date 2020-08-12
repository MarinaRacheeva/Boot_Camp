<?php 
require 'application/models/index.php';
require 'includes/template_header.php';?>
    <h1 class="invisible">Company - Электронные сигареты</h1>
    <ul class="categories">
    <? 
    $categories = getCategories();
    foreach ($categories as $cat):           
        if ($cat["image"] == ''):
            $cat["image"] = 'img/category-none.jpg';
        endif;?>
        <li class="category">
            <a class="category__link" href="catalog.php?cat_id=<?=$cat["id"]?>">
                <img class="category__image" src="<?=$cat["image"]?>" alt="<?=$cat["name"]?>">
                <span class="category__name-container"><span class="category__name-inner"><?=$cat["name"]?></span></span>
            </a>
        </li>
    <?endforeach;?>
    </ul>
<? require 'includes/template_footer.php' ?>