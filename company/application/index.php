<?php require 'template/header.php';?>
<main class="categories">
    <h1 class="invisible">Company - Электронные сигареты</h1>
    <ul class="categories">
    <? require 'application/models/index.php';
    foreach ($categories as $cat) 
            {
                if ($cat["image"] == '') 
                {
                    $cat["id"] = 'none';
                    $cat["image"] = 'img/category-none.jpg';
                }
                echo '<li class="category">
                        <a class="category__link" href="catalog.php?cat_id=' . $cat["id"] . '">
                            <img class="category__image" src="' . $cat["image"] . '" alt="category-image-' . $cat["id"] . '">
                            <span class="category__name-container"><span class="category__name-inner">' . $cat["name"] . '</span></span>
                        </a>
                    </li>'; 
            }?>
    </ul>
</main>

<? require 'template/footer.php' ?>