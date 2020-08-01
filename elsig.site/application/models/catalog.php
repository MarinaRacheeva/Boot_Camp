<?php
require 'includes/config.php';
function clearInt($data){
    return abs((int)$data);
}
// задаем параметры для пагинации товаров
$page = 1;
$input_page = clearInt($_GET['page']);
if (isset($_GET['page']))
{
	$page = $input_page;
}
$start = ($page * $kol_prod) - $kol_prod;
// выбор всех товаров
$sql = "SELECT p.id as product_id, p.name as product_name, p.image as product_image, p.price as product_price FROM Product p  LIMIT $start, $kol_prod";
$res = mysqli_query($link, $sql);
$sql_kol = "SELECT p.id as product_id, p.name as product_name, p.image as product_image, p.price as product_price FROM Product p";

// выбор товаров по категориям
$cat_id = clearInt($_GET["cat_id"]);
if ($cat_id)
    {
       	$sql = "SELECT p.id as product_id, p.name as product_name, p.image as product_image, p.price as product_price, c.id as category_id, c.name as category_name FROM Product p JOIN Product_category pc ON p.id = pc.product_id JOIN category c ON pc.category_id = c.id WHERE pc.category_id = $cat_id LIMIT $start, $kol_prod";
        $res = mysqli_query($link, $sql);
        $sql_bc = "SELECT p.id as product_id, p.name as product_name, p.image as product_image, p.price as product_price, c.id as category_id, c.name as category_name FROM Product p JOIN Product_category pc ON p.id = pc.product_id JOIN category c ON pc.category_id = c.id WHERE pc.category_id = $cat_id LIMIT 1";
        $res_bc = mysqli_query($link, $sql_bc);
        $sql_kol = "SELECT p.id as product_id, p.name as product_name, p.image as product_image, p.price as product_price, c.id as category_id, c.name as category_name FROM Product p JOIN Product_category pc ON p.id = pc.product_id JOIN category c ON pc.category_id = c.id WHERE pc.category_id = $cat_id";
    }

// выбор товаров по цене
if ($_GET["price_from"] || $_GET["price_to"])
{
    $priceMin = clearInt($_GET["price_from"]);
    $priceMax = clearInt($_GET["price_to"]);
    if ($cat_id) 
    {
        $sql = "SELECT p.id as product_id, p.name as product_name, p.image as product_image, p.price as product_price, pc.category_id as category_id FROM Category c JOIN product_category pc ON c.id = pc.category_id JOIN product p ON pc.product_id = p.id WHERE (pc.category_id = $cat_id) AND (p.price BETWEEN $priceMin AND $priceMax) LIMIT $start, $kol_prod";
        $sql_kol = "SELECT p.id as product_id, p.name as product_name, p.image as product_image, p.price as product_price, pc.category_id as category_id FROM Category c JOIN product_category pc ON c.id = pc.category_id JOIN product p ON pc.product_id = p.id WHERE (pc.category_id = $cat_id) AND (p.price BETWEEN $priceMin AND $priceMax)";
    }
    else 
    {
        $sql = "SELECT p.id as product_id, p.name as product_name, p.image as product_image, p.price as product_price, pc.category_id as category_id FROM Category c JOIN product_category pc ON c.id = pc.category_id JOIN product p ON pc.product_id = p.id WHERE (p.main_category = c.id) AND (p.price BETWEEN $priceMin AND $priceMax) LIMIT $start, $kol_prod";
        $sql_kol = "SELECT p.id as product_id, p.name as product_name, p.image as product_image, p.price as product_price, pc.category_id as category_id FROM Category c JOIN product_category pc ON c.id = pc.category_id JOIN product p ON pc.product_id = p.id WHERE (p.main_category = c.id) AND (p.price BETWEEN $priceMin AND $priceMax)";
    }
    $res = mysqli_query($link, $sql);
    $product_kol = mysqli_num_rows(mysqli_query($link, $sql_kol)); 
}

// условия для пагинации
$active = $input_page;
$next = $active + 1;
$total = mysqli_num_rows(mysqli_query($link, $sql_kol));
$kol_page = ceil($total / $kol_prod);
$strq = strstr($_SERVER['QUERY_STRING'], 'page');
$strq1 = explode('page', $strq);
if (!$_SERVER['QUERY_STRING'])
    $q = '?page=';
else
    if ($cat_id)
        $q = '?cat_id='. $cat_id . '&page=';
    else $q = '?page=';