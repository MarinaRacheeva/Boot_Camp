<?php

const DB_HOST = 'localhost';
const DB_LOGIN = 'root';
const DB_PASS = 'root';
const DB_NAME = 'company';

$link = mysqli_connect(DB_HOST, DB_LOGIN, DB_PASS, DB_NAME) 
or die(mysqli_connect_error());


function clearInt($data){
    return abs((int)$data);
}

if ($_SERVER["REQUEST_METHOD"] == "POST")
{
    $cat_id = $_GET["cat_id"];
    $priceMin = clearInt($_POST["cost-from"]);
    $priceMax = clearInt($_POST["cost-to"]);
    $sql = "SELECT id, name, price, image FROM Product p JOIN Product_category pc ON p.id = pc.product_id WHERE (pc.category_id = $cat_id) AND (p.price BETWEEN $priceMin AND $priceMax)";
    $res = mysqli_query($link, $sql);
    if (mysqli_num_rows($res) == 0)
        echo 'По вашему запросу товаров не найдено :(';
}
else
{
    if ($_GET["cat_id"])
    {
	    $cat_id = $_GET["cat_id"];
    	$sql = "SELECT * FROM Product p JOIN Product_category pc ON p.id = pc.product_id WHERE pc.category_id = $cat_id";
    	$res = mysqli_query($link, $sql);
    }
    else
    {
        $sql = "SELECT * FROM Product";
        $res = mysqli_query($link, $sql);
    } 
}

foreach ($res as $product) { 
    echo '<li class="category good-piece">
         <a class="category__link" href="product.php?id='. $product["id"] .'">
         <img class="category__image good__image" src="' . $product["image"] . '" alt="category-image-' . $product["id"] . '">
         <span class="category__name-container good_name"><span class="category__name-inner">' . $product["name"] . '</span></span>
         </a>
         <span class="good-price good_price">' . $product["price"] . '<small class="good-price__currency"> руб.</small></span>
     </li>';
 }





