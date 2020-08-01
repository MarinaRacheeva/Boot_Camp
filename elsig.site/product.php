<?php include 'template_header.php' ?>
<div class="content content__product">
    <div class="wrapper content__wrapper">
        <main class="inside-content">
            <nav class="bread-crumbs-container product__bread-crumbs">
                <ul class="bread-crumbs">
                <?php  //вывод хлебных крошек для товара
                    include 'application/models/product.php';
                    if ($res)
                    {
                        foreach ($res as $prod)
                        {
                            echo '<li class="bread-crumb"><a class="bread-crumb__link" href="index.php">Главная</a></li>
                                    <li class="bread-crumb"><a class="bread-crumb__link" href="catalog.php">Каталог</a></li>';
                            foreach ($res_cat as $row)
                                echo '<li class="bread-crumb"><a class="bread-crumb__link" href="catalog.php?cat_id='. $row["id"] .'">'. $row["name"] .'</a></li>
                                        <li class="bread-crumb bread-crumb_current">'. $prod["name"] .'</li>
                                    </ul>
                                </nav>'; 
                        //вывод товара                  
                        if ($prod["image"] == '') 
                        {
                            $prod["image"] = 'img/category-none.jpg';
                        }
                        echo '<section class="product">
                                <h1 class="product__info-block-part product__headline">' . $prod["name"] . '</h1>
                                <img class="product__image" src="' . $prod["image"] . '"alt="Упс! Здесь было фото сигареты, но теперь его нет :(">
                                <span class="good-price good_price product__info-block-part product__info-price">' . $prod["price"] . ' <small class="good-price__currency">руб.</small></span>
                                <article class="product__description">
                                    ' . $prod["description"] . '
                                </article>
                            </section>';
                        }
                    }
                ?>
        </main>
        <?php include_once 'sidebar.php' ?>
    </div>
</div>
<?php include 'template_footer.php' ?>