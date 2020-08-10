<?php 
require 'template/header.php';

if ($_GET['id']) 
{
    $sql = "SELECT id FROM Product";
    $res = mysqli_query($link, $sql);
    foreach ($res as $prod)
    {
        $mas_prod[] = $prod['id'];
    }
    if (!in_array($_GET['id'], $mas_prod))
    {
        header($_SERVER['SERVER_PROTOCOL'] . ' 404 Not Found');
        header('Location: 404.php');
    }
}
function clearInt($data){
    return abs((int)$data);
}

// выбор данных о товаре по id
$id = clearInt($_GET['id']);
$sql = "SELECT * FROM Product WHERE id = $id";
$res = mysqli_query($link, $sql); 

// поиск названия категории, если она передана в адресе
if ($_GET["cat_id"])
{
    $cat_id = $_GET["cat_id"];
    $sql_cat = "SELECT c.id, c.name FROM Category c WHERE id = $cat_id";
    $res_cat = mysqli_query($link, $sql_cat); 
}
// поиск названия главной категории, если она не передана в адресе
else 
{
    foreach ($res as $row_cat)
    $cat_id = $row_cat["main_category"];
    $sql_cat = "SELECT c.id, c.name FROM Category c JOIN product_category pc ON c.id = pc.category_id JOIN product p ON pc.product_id = p.id WHERE (p.main_category = c.id) AND (p.id = $id)";
    $res_cat = mysqli_query($link, $sql_cat); 
}

?> 
<main class="inside-content">
<nav class="bread-crumbs-container product__bread-crumbs">
    <ul class="bread-crumbs">

        <? //вывод хлебных крошек для товара
        if ($res)
        {
            foreach ($res as $prod)
            {
                echo '<li class="bread-crumb"><a class="bread-crumb__link" href="index.php">Главная</a></li>
                        <li class="bread-crumb"><a class="bread-crumb__link" href="catalog.php">Каталог</a></li>';
                foreach ($res_cat as $row){
                    echo '<li class="bread-crumb"><a class="bread-crumb__link" href="catalog.php?cat_id='. $row["id"] .'">'. $row["name"] .'</a></li>
                            <li class="bread-crumb bread-crumb_current">'. $prod["name"] .'</li>';
                            
                }
                echo  '</ul>
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
<? require 'template/sidebar.php' ?>
    </div>
</div>
<? require 'template/footer.php' ?>