<?php require 'includes/lib.php';

// выбор данных о товаре по id
$id = clearInt($_GET['id']);
$sqlp = "SELECT * FROM Product WHERE id = $id";
$resp = getResult($sqlp); 

$sql_cat = "SELECT c.id, c.name FROM Category c";
// поиск названия категории, если она передана в адресе
if ($_GET["cat_id"])
{
    $cat_id = $_GET["cat_id"];
    $sql_cat = $sql_cat . " WHERE id = $cat_id";
}
// поиск названия главной категории, если она не передана в адресе
else
{
    foreach ($resp as $row_cat)
        $sql_cat = $sql_cat . " JOIN product_category pc ON c.id = pc.category_id JOIN product p ON pc.product_id = p.id WHERE (p.main_category = c.id) AND (p.id = $id)";
}
$res_cat = getResult($sql_cat);

if ($_GET['id']) 
{
    $sql = "SELECT id FROM Product";
    $res = getResult($sql);
    foreach ($res as $prod)
    {
        $mas_prod[] = $prod['id'];
    }
    if (!in_array($_GET['id'], $mas_prod))
    {
        header('Location: 404.php');
    }
}