<?php


////от этого куска легко избавиться, поменяв в форме фильтра action=POST на action=GET
/*if ($_SERVER["REQUEST_METHOD"] == "POST")
{
		if ($_GET['cat_id']){
			$str = explode("&", $_SERVER["REQUEST_URI"]);
			header("Location: " . $str[0] . '&cost-from=' . $_POST["cost-from"] . '&cost-to=' . $_POST["cost-to"]);
		}
		else header("Location: " . $_SERVER["PHP_SELF"] . '?cost-from=' . $_POST["cost-from"] . '&cost-to=' . $_POST["cost-to"]);

}*/

//// в концепции mvc данный файл является контроллером. здесь мы не работаем с хранилищем данных, а можем только проверить параметры на их
///  адекватность нашим ожиданиям. Например, мы ожидаем, что cat_id — это целое положительное число в диапазоне от 1 и далее. или же оно не
///  задано вообще (мы находимся в главной категории). Стало быть, если оно задано и не соответствует нашим ожиданиям, мы делаем 404
/// касаемо самой проверки в модели, нет смысла дёргать базу, если мы уже на этот момент получили массив категорий
/*if ($_SERVER["REQUEST_METHOD"] == "GET") {
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
}*/
require 'application/views/catalog.php'


?>



    <?
    //// в либы
    
   
    //// в консты
    

    

    //// уже в модель
    

    // выбор всех товаров

    //// по запросу
    //	sql запрос должен отличаться для ситуаций, когда у нас задана категория и для ситуаций, когда нет.
    //	когда нет — мы просто выбираем все товары из продуктов
    //	когда да — мы выбираем строки из таблицы-коннектора, где категория = заданной, соединяя их с таблицей продуктов по id продукта, то есть join только один, тащить ещё и категории не нужно

    //// запрос делается дважды:
    //	сначала все, чтобы получить количество, а потом только нужный диапазон, соответствующий странице
    //	в первом случае было достаточно выбирать COUNT(*)

    //// естественно, весь код с логикой уезжает в модель

    //// запрос надо не дублировать, а собирать, дополняя повторяющийся фрагмент дополнительными данными (конкатенация строк)


