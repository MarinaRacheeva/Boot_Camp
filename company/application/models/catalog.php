<?php
require 'includes/lib.php';
function getParam() //создаем массив с параметрами запроса
{
    $cat_id = (isset($_GET['cat_id'])) ? clearInt($_GET['cat_id']) : 0;
    $priceMin = (isset($_GET['cost-from'])) ? clearInt($_GET['cost-from']) : 0;
    $priceMax = (isset($_GET['cost-to'])) ? clearInt($_GET['cost-to']) : 1000000;
    $page = (isset($_GET['page'])) ? clearInt($_GET['page']) : 1;
    return array(
        'cat_id' => $cat_id,
        'cost-from' => $priceMin,
        'cost-to' => $priceMax,
        'page' => $page
    );
}

function getProduct($options, $link) //выбираем товары по всем возможным запросам
{
    $priceMin = $options['cost-from'];
    $priceMax = $options['cost-to'];
    $cat_id = $options['cat_id'];
    $page = $options['page'];
    $start = ($page * KOL_PROD) - KOL_PROD;

    $catJoin =
        ($cat_id)
            ? " JOIN Product_category pc ON pc.product_id = p.id "
            : '';
    $catWhere =
        ($cat_id)
            ? " (pc.category_id = $cat_id)"
            : '';
    $priceWhere =
        ($priceMin || $priceMax)
            ? " (p.price BETWEEN $priceMin AND $priceMax) "
            : '';
    $priceCat = 
        (($cat_id) && ($priceMin || $priceMax))
            ? " AND "
            : '';
    $pageLimit =
        ($page !== 0)
            ? (" LIMIT $start, " . KOL_PROD) 
            : '';
    $sql = "
        SELECT * FROM Product p
        $catJoin
        where
            $catWhere
            $priceCat
            $priceWhere
            $pageLimit
    ";
    return $data = getResult($sql);
}

function getProductKol($options, $link) //получаем количество товаров
{
    $priceMin = $options['cost-from'];
    $priceMax = $options['cost-to'];
    $cat_id = $options['cat_id'];

    $catJoin =
        ($cat_id !== 0)
            ? " JOIN Product_category pc ON pc.product_id = p.id "
            : '';
    $catWhere =
        ($cat_id !== 0)
            ? " pc.category_id = $cat_id "
            : '';
    $priceWhere =
        ($priceMin || $priceMax)
            ? " (p.price BETWEEN $priceMin AND $priceMax) "
            : '';
    $priceCat = 
        (($cat_id) && ($priceMin || $priceMax))
            ? " AND "
            : '';

    $sql_kol = "
        SELECT COUNT(*) as kol FROM product p 
        $catJoin
        WHERE
            $catWhere
            $priceCat
            $priceWhere
    ";
    return $data_kol = getResult($sql_kol);
}
$cat_id = clearInt($_GET['cat_id']);
$options = getParam();
$products = getProduct($options, $link);
$sql_bc = "SELECT id, name FROM Category WHERE id = $cat_id"; 
$crumbs = getResult($sql_bc);

$product_kol = getProductKol($options, $link);
foreach ($product_kol as $pr)
    $pr_kol = $pr['kol'];

// условия для пагинации
$input_page = clearInt($_GET['page']);
$active = $input_page;
$next = $active + 1;
$kol_page = ceil($pr_kol / KOL_PROD);

if (!$_SERVER['QUERY_STRING'])
    $q = '?page=';
else
    if (($_GET['cat_id']) && ($_GET['cost-from'] || $_GET['cost-to']))
        $q = '?cat_id=' . $_GET['cat_id'] . '&cost-from='. $_GET['cost-from'] . '&cost-to='. $_GET['cost-to'] . '&page='; 
    elseif ($_GET['cat_id'])
    $q = '?cat_id='. $_GET['cat_id'] . '&page=';
    elseif ($_GET['cost-from'] || $_GET['cost-to'])
        $q = '?cost-from='. $_GET['cost-from'] . '&cost-to='. $_GET['cost-to'] . '&page=';
    else $q = '?page='; 

//проверка на корректность полученных значений страницы и категории
if (($_GET['page']) && (($_GET['page'] > $kol_page) || ($_GET['page'] < 1) || (!$_GET['page']))) header('Location: /404.php');
if ($_SERVER["REQUEST_METHOD"] == "GET") {
	if ($_GET['cat_id'])
	{
		$cat_arr = getCategories();
        foreach ($cat_arr as $cat)
        {
            $mas_cat[] = $cat['id'];
        }
        if (!in_array($_GET['cat_id'], $mas_cat))
        {
            header('Location: /404.php');
		}
    }
}