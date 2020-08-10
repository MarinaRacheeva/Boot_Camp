<?php
require 'includes/lib.php';
 // задаем параметры для пагинации товаров
$input_page = clearInt($_GET['page']);
////требуется улучшить проверку параметра
if (isset($_GET['page']))
{
    $page = $input_page;
}

$start = ($page * KOL_PROD) - KOL_PROD;
//$sql_bc = "SELECT id, name FROM Category"

// выбор товаров по категориям
$cat_id = clearInt($_GET["cat_id"]);
$priceMin = clearInt($_GET["price_from"]);
$priceMax = clearInt($_GET["price_to"]);

$sql = "SELECT * FROM Product p";
$ifcat = " JOIN Product_category pc ON pc.product_id = p.id WHERE (pc.category_id = $cat_id)";
$sql_kol = "SELECT COUNT(*) as kol FROM product p";

if ($cat_id)
{
    if ($_GET["price_from"] || $_GET["price_to"])
    {
        $sql = $sql . $ifcat . " AND (p.price BETWEEN $priceMin AND $priceMax) LIMIT $start, " . KOL_PROD;
        $sql_kol = $sql_kol . $ifcat . " AND (p.price BETWEEN $priceMin AND $priceMax)";
    }
    else
    {
        $sql = $sql . $ifcat . " LIMIT $start, " . KOL_PROD;
        $sql_kol = $sql_kol . $ifcat;
    }
    $sql_bc = "SELECT id, name FROM Category WHERE id = $cat_id";       
}
else
{
    if ($_GET["price_from"] || $_GET["price_to"])
    {
        $sql = $sql . " WHERE (p.price BETWEEN $priceMin AND $priceMax) LIMIT $start, " . KOL_PROD;
        $sql_kol = $sql_kol . " WHERE (p.price BETWEEN $priceMin AND $priceMax)";        
    }
    else
        $sql = $sql . " LIMIT $start, " . KOL_PROD;
}
$products = getResult($sql);
$crumbs = getResult($sql_bc);
$product_kol = getResult($sql_kol);
foreach ($product_kol as $pr)
$pr_kol = $pr['kol'];

// условия для пагинации
$active = $input_page;
$next = $active + 1;
    $kol_page = ceil($pr_kol / KOL_PROD);
$strq = strstr($_SERVER['QUERY_STRING'], 'page');
$strq1 = explode('page', $strq);
if (!$_SERVER['QUERY_STRING'])
    $q = '?page=';
else
    if ($cat_id)
        $q = '?cat_id='. $cat_id . '&page=';
    else $q = '?page=';
