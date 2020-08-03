<?php 
require 'template/header.php';
if ($_SERVER["REQUEST_METHOD"] == "POST")
{
	if (!$_SERVER['QUERY_STRING'])
		header("Location: " . $_SERVER["REQUEST_URI"] . '?price_from=' . $_POST["cost-from"] . '&price_to=' . $_POST["cost-to"]); 
	else
	{
		if ($_GET['cat_id']){
			$str = explode("&", $_SERVER["REQUEST_URI"]);
			header("Location: " . $str[0] . '&price_from=' . $_POST["cost-from"] . '&price_to=' . $_POST["cost-to"]); 
		}
		else header("Location: " . $_SERVER["PHP_SELF"] . '?price_from=' . $_POST["cost-from"] . '&price_to=' . $_POST["cost-to"]); 
	}
}

if ($_SERVER["REQUEST_METHOD"] == "GET") {
	if ($_GET['cat_id']) 
	{
		$sql = "SELECT id FROM Category";
        $res = mysqli_query($link, $sql);
        foreach ($res as $cat)
        {
            $mas_cat[] = $cat['id'];
        }
        if (!in_array($_GET['cat_id'], $mas_cat))
        {
            header($_SERVER['SERVER_PROTOCOL'] . ' 404 Not Found');
            header('Location: 404.php');
		}
    }
}


?>

<main class="inside-content">
    <h1 class="invisible">Каталог товаров</h1>

    <?
    function clearInt($data){
        return abs((int)$data);
    }
    // задаем параметры для пагинации товаров
    define("KOL_PROD", 12);
    $page = 1;
    $input_page = clearInt($_GET['page']);
    if (isset($_GET['page']))
    {
        $page = $input_page;
    }
    $start = ($page * KOL_PROD) - KOL_PROD;
    
    // выбор всех товаров
    $sql = "SELECT p.id as product_id, p.name as product_name, p.image as product_image, p.price as product_price FROM Product p  LIMIT $start, " . KOL_PROD;
    $res = mysqli_query($link, $sql);
    $sql_kol = "SELECT p.id as product_id, p.name as product_name, p.image as product_image, p.price as product_price FROM Product p";

    // выбор товаров по категориям
    $cat_id = clearInt($_GET["cat_id"]);
    if ($cat_id)
        {
            $sql = "SELECT p.id as product_id, p.name as product_name, p.image as product_image, p.price as product_price, c.id as category_id, c.name as category_name FROM Product p JOIN Product_category pc ON p.id = pc.product_id JOIN category c ON pc.category_id = c.id WHERE pc.category_id = $cat_id LIMIT $start, " . KOL_PROD;
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
            $sql = "SELECT p.id as product_id, p.name as product_name, p.image as product_image, p.price as product_price, pc.category_id as category_id FROM Category c JOIN product_category pc ON c.id = pc.category_id JOIN product p ON pc.product_id = p.id WHERE (pc.category_id = $cat_id) AND (p.price BETWEEN $priceMin AND $priceMax) LIMIT $start, " . KOL_PROD;
            $sql_kol = "SELECT p.id as product_id, p.name as product_name, p.image as product_image, p.price as product_price, pc.category_id as category_id FROM Category c JOIN product_category pc ON c.id = pc.category_id JOIN product p ON pc.product_id = p.id WHERE (pc.category_id = $cat_id) AND (p.price BETWEEN $priceMin AND $priceMax)";
        }
        else 
        {
            $sql = "SELECT p.id as product_id, p.name as product_name, p.image as product_image, p.price as product_price, pc.category_id as category_id FROM Category c JOIN product_category pc ON c.id = pc.category_id JOIN product p ON pc.product_id = p.id WHERE (p.main_category = c.id) AND (p.price BETWEEN $priceMin AND $priceMax) LIMIT $start, " . KOL_PROD;
            $sql_kol = "SELECT p.id as product_id, p.name as product_name, p.image as product_image, p.price as product_price, pc.category_id as category_id FROM Category c JOIN product_category pc ON c.id = pc.category_id JOIN product p ON pc.product_id = p.id WHERE (p.main_category = c.id) AND (p.price BETWEEN $priceMin AND $priceMax)";
        }
        $res = mysqli_query($link, $sql);
        $product_kol = mysqli_num_rows(mysqli_query($link, $sql_kol)); 
    }

    // условия для пагинации
    $active = $input_page;
    $next = $active + 1;
    $total = mysqli_num_rows(mysqli_query($link, $sql_kol));
    $kol_page = ceil($total / KOL_PROD);
    $strq = strstr($_SERVER['QUERY_STRING'], 'page');
    $strq1 = explode('page', $strq);
    if (!$_SERVER['QUERY_STRING'])
        $q = '?page=';
    else
        if ($cat_id)
            $q = '?cat_id='. $cat_id . '&page=';
        else $q = '?page=';

    //вывод "хлебных крошек"  
    if ($res)   
    {  
        if ($_GET["cat_id"])
        {  
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
            <input class="search-filter__input" step="0.01" type="number" min="0" name="cost-from" id="cost-from"
                placeholder="от">
        </span>
        <span class="search-filter__item">
            <label class="search-filter__label" for="cost-to">—</label>
            <input class="search-filter__input" type="number" min="0" name="cost-to" id="cost-to" placeholder="до">
        </span>
        <input class="form-submit search-filter__apply" type="submit" value="Применить">
    </form>

    <? //вывод количества найденных товаров по фильтру цены
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
    
    //постраничная навигация по товарам
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
<? require 'template/sidebar.php' ?>
</div>
</div>
<? require 'template/footer.php' ?>