<?php require 'template/header.php';?>
<main class="inside-content"> <?php ////в шаблон?>
    <h1 class="invisible">Каталог товаров</h1> <?php ////во вьюху?>
    <? require 'application/models/catalog.php';

    //вывод "хлебных крошек"
    //// тут всё просто: если категория есть в массиве, выводим её. если нет, считаем, что мы в каталоге и не выводим ничего.
    /// без лишних операций и переменных
    /// естественно, это уезжает во вьюху?>
    <nav class="bread-crumbs-container">
        <ul class="bread-crumbs">
            <li class="bread-crumb"><a class="bread-crumb__link" href="index.php">Главная</a></li>
            <li class="bread-crumb"><a class="bread-crumb__link" href="catalog.php">Каталог</a></li>
            <?
    if ($products)
    {
        if ($_GET["cat_id"])
        {
            foreach ($crumbs as $cat)
            {
                echo '<li class="bread-crumb bread-crumb_current">'. $cat["name"] .'</li>';
            }
        }
        ?>
        </ul>
    </nav>

    <?//// в форму надо подставлять введённые ранее значения?>
    <form class="search-filter" id="catalog-page__search-filter-1" method="GET" action="catalog.php">
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
        //// это во вьюху
        

        if ($_GET["cost-from"] || $_GET["cost-to"])
        {
            if ($pr_kol == 0)
                echo '<p> По вашему запросу товаров не найдено :( </p> ';
            else
            {
                $ost = $pr_kol % 10;
                if ($ost == 1)
                    $tov = ' товар';
                elseif (($ost == 2) || ($ost == 3) || ($ost == 4))
                    $tov = ' товара';
                else
                    $tov = ' товаров';
            echo '<p> По вашему запросу найдено ' . $pr_kol . $tov . '</p> ';
            }
        }

        //вывод товаров
        //// это во вьюху
        echo '<ul class="categories categories__reposition">';
        foreach ($products as $product)
        {
            echo '<li class="category good-piece">';
            if ($product["image"] == '')
                $product["image"] = 'img/category-none.jpg';
            if ($_GET["cat_id"])
            {
                echo '<a class="category__link" href="product.php?id='. $product["id"] .'&cat_id=' . $product["category_id"] . '">';

            }
            else
            {
                echo '<a class="category__link" href="product.php?id='. $product["id"] .'">';
            }
            echo
                    '<img class="category__image good__image" src="' . $product["image"] . '" alt="category-image-' . $product["id"] . '">
                    <span class="category__name-container good_name"><span class="category__name-inner">' . $product["name"] . '</span></span>
                </a>
                <span class="good-price good_price">' . $product["price"] . '<small class="good-price__currency"> руб.</small></span>
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
<? require 'template/footer.php' ?>