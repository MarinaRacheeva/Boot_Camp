<?php
require 'includes/DBconnect.php';
function getResult($sql)
{
    global $link;
    if ($sql)
    {
        $res = mysqli_query($link, $sql);
        return $res;
    }
}

function clearInt($data)
{
    return abs((int)$data);
}
function clearStr($data) 
{
    global $link;
    $data = trim(strip_tags($data));
    return mysqli_real_escape_string($link, $data);
}

//задаем заголовок страницы
function getTitle()
{
    global $menu;
    global $link;
    if (($_SERVER[PHP_SELF] == '/product.php') && ($_GET['id']))
        $sql_tit = "SELECT name FROM product WHERE id = " . $_GET['id'];
    if ($_SERVER[PHP_SELF] == '/news-detail.php')
        $sql_tit = "SELECT header as name FROM news WHERE id = " . $_GET['id'];
    if (($_SERVER[PHP_SELF] == '/catalog.php') && ($_GET['cat_id']))
        $sql_tit = "SELECT name FROM category WHERE id = " . $_GET['cat_id'];
    if ($sql_tit){
        $t = mysqli_query($link, $sql_tit);
        foreach ($t as $mas){
            $tit = $mas['name'];}
    }
    elseif ($_SERVER[PHP_SELF] == '/404.php')
        $tit = 'Страницы не существует';
    else $tit = $menu[$_SERVER[PHP_SELF]];
    return $tit;
}

//получаем категории
function getCategories()
{
    $sql = "SELECT id, name, image FROM Category";
    return $categories = getResult($sql);
}

//получаем новости
function getNews()
{
    $sql = 'SELECT id, header, date FROM News ORDER BY date DESC LIMIT '.KOL_NEWS_SB;
    return $news = getResult($sql);
}

// расширение массива для вывода подменю
foreach ($menu as $add => $t)
{
    if ($add != '/catalog.php')
        $submenu[$add][$t] = 0;
    else
        $submenu[$add][$t] = 1;       
}