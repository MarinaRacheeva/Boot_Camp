<?php include 'template_header.php'; ob_start();?>
<div class="content">
    <div class="wrapper content__wrapper">
        <main class="inside-content">
            <h1 class="invisible">Каталог товаров</h1>  
                <?php include "application/models/catalog.php";  
                    if ($res)   
                    {  
                        if ($_GET["cat_id"])
                        { //вывод "хлебных крошек"   
                            foreach ($res_bc as $cat) 
                            {
                                echo '<nav class="bread-crumbs-container">
                                        <ul class="bread-crumbs">
                                            <li class="bread-crumb"><a class="bread-crumb__link" href="index.php">Главная</a></li>
                                            <li class="bread-crumb"><a class="bread-crumb__link" href="catalog.php">Каталог</a></li> 
                                            <li class="bread-crumb bread-crumb_current">'. $cat["category_name"] .'</li>
                                        </ul>
                                    </nav>';
                            }
                        }
                    else 
                    {
                        echo '<nav class="bread-crumbs-container">
                                <ul class="bread-crumbs">
                                    <li class="bread-crumb"><a class="bread-crumb__link" href="index.php">Главная</a></li>
                                    <li class="bread-crumb bread-crumb_current">Каталог</a></li>
                                </ul>
                            </nav>';
                    }
                ?>                   
            <form class="search-filter" id="catalog-page__search-filter-1" method="POST">
                <span class="search-filter__item">
                    <label class="search-filter__label" for="cost-from">Цена</label>
                    <input class="search-filter__input" step="0.01" type="number" min="0" name="cost-from" id="cost-from" placeholder="от">
                </span>
                <span class="search-filter__item">
                    <label class="search-filter__label" for="cost-to">—</label>
                    <input class="search-filter__input" type="number" min="0" name="cost-to" id="cost-to" placeholder="до">
                </span>
                <input class="form-submit search-filter__apply" type="submit" value="Применить">
            </form>
            <?           
            //вывод количества найденных товаров по фильтру цены
            if ($_GET["price_from"] || $_GET["price_to"])   
            {   
                if ($product_kol == 0)
                    echo '<p> По вашему запросу товаров не найдено :( </p> ';
                else
                {
                    $ost = $product_kol % 10;
                    if ($ost == 1)
                        $tov = ' товар'; 
                    elseif (($ost == 2) || ($ost == 3) || ($ost == 4)) 
                        $tov = ' товара'; 
                    else 
                        $tov = ' товаров';
                echo '<p> По вашему запросу найдено ' . $product_kol . $tov . '</p> ';
                }
            }

            //вывод товаров
            echo '<ul class="categories categories__reposition">';
            foreach ($res as $product)
            {
                echo '<li class="category good-piece">';
                if ($product["product_image"] == '') 
                    $product["product_image"] = 'img/category-none.jpg';
                if ($_GET["cat_id"])
                {
                    echo '<a class="category__link" href="product.php?id='. $product["product_id"] .'&cat_id=' . $product["category_id"] . '">';
                }
                else
                {
                    echo '<a class="category__link" href="product.php?id='. $product["product_id"] .'">';
                }
                echo 
                        '<img class="category__image good__image" src="' . $product["product_image"] . '" alt="category-image-' . $product["product_id"] . '">
                        <span class="category__name-container good_name"><span class="category__name-inner">' . $product["product_name"] . '</span></span>
                    </a>
                    <span class="good-price good_price">' . $product["product_price"] . '<small class="good-price__currency"> руб.</small></span>
                </li>'; 
            }

            }
            echo '</ul>
                <ul class="paginator catalog-page__paginator">';    
            if ($kol_page > 1)   
            {
                for ($i = 1; $i <= $kol_page; $i++)
                {
                    if ($i == $active) echo '<li class="paginator__elem paginator__elem_current"><span class="paginator__link">'.$i. '</span></li>';
                    else echo '<li class="paginator__elem"><a href=catalog.php' . $q.$i.'> '.$i.' </a></li>';
                }
                if ($active != $kol_page)
                    echo '<li class="paginator__elem paginator__elem_next"><a href="' . $q.$next . '" class="paginator__link">Следующая страница</a></li>';
                else
                    echo '<li class="hidden paginator__elem paginator__elem_next"><span class="paginator__link">Следующая страница</span></li>';
            }  
            ?>
            </ul>
        </main>
        <?php include_once 'sidebar.php'; ?>
    </div>
</div>
<?php include 'template_footer.php' ?>