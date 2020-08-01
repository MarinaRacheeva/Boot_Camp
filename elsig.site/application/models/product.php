<?php
require 'includes/lib.php';
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