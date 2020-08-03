<?php
    $link = mysqli_connect('localhost', 'root', 'root', 'company') 
    or die(mysqli_connect_error());
    /*
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

	if ($_GET['id'] && ($_SERVER['SCRIPT_NAME'] == '/product.php')) 
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

	if ($_GET['id'] && ($_SERVER['SCRIPT_NAME'] == '/news-detail.php')) 
	{
		$sql = "SELECT id FROM News";
        $res = mysqli_query($link, $sql);
        foreach ($res as $new)
        {
            $mas_new[] = $new['id'];
        }
        if (!in_array($_GET['id'], $mas_new))
        {
            header($_SERVER['SERVER_PROTOCOL'] . ' 404 Not Found');
            header('Location: 404.php');
		}
	}
	elseif (!$_GET['id'] && ($_SERVER['SCRIPT_NAME'] == '/news-detail.php'))  {
		header($_SERVER['SERVER_PROTOCOL'] . ' 404 Not Found');
		header('Location: 404.php');
	}
}

include_once '../catalog.php';
for ($i=1; $i<=$kol_page; $i++)
{
    $mas_page[] = $i;
}
if (!in_array($_GET['page'], $mas_page))
        {
            header($_SERVER['SERVER_PROTOCOL'] . ' 404 Not Found');
            header('Location: 404.php');
		}*/