<?php
    //сюда можно сложить какие-то вспомогательные функции, функции для подключения к БД с возвратом дескриптора
    include 'config.php';
    $link = mysqli_connect(DB_HOST, DB_LOGIN, DB_PASS, DB_NAME) 
    or die(mysqli_connect_error());
    
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