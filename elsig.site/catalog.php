<?php include 'template_header.php'; ob_start();?> 

<?php    //контроллер для списка товаров. проверяем корректность параметров и подключаем соответствующую модель ?>

    <div class="content">
    <div class="wrapper content__wrapper">
        <main class="inside-content">
            <h1 class="invisible">Каталог товаров</h1>
            <nav class="bread-crumbs-container">
                <ul class="bread-crumbs">
                    <li class="bread-crumb"><a class="bread-crumb__link" href="index.php">Главная</a></li>
                    <li class="bread-crumb bread-crumb_current">Каталог</li>
                </ul>
            </nav>
            <form class="search-filter" id="catalog-page__search-filter-1" method="POST">
                <span class="search-filter__item">
                    <label class="search-filter__label" for="cost-from">Цена</label>
                    <input class="search-filter__input" step="0.01" type="number" min="0" name="cost-from" id="cost-from" placeholder="от">
                </span>
                <span class="search-filter__item">
                    <label class="search-filter__label" for="cost-to">—</label>
                    <input class="search-filter__input" type="number" min="0" name="cost-to" id="cost-to" placeholder="до">
                </span>
                <input class="form-submit search-filter__apply" type="submit" value="Применить">
                
            </form>
            <ul class="categories categories__reposition">
                <?php include "application/models/catalog.php";
                   
                 
                ?>
            </ul>
            <ul class="paginator catalog-page__paginator">
                <li class="paginator__elem"><a href="#" class="paginator__link">1</a></li>
                <li class="paginator__elem"><a href="#" class="paginator__link">2</a></li>
                <li class="paginator__elem"><a href="#" class="paginator__link">3</a></li>
                <li class="paginator__elem paginator__elem_current"><span class="paginator__link">4</span></li>
                <li class="paginator__elem"><a href="#" class="paginator__link">5</a></li>
                <li class="paginator__elem"><a href="#" class="paginator__link">6</a></li>
                <li class="paginator__elem"><a href="#" class="paginator__link">7</a></li>
                <li class="paginator__elem paginator__elem_next"><a href="#" class="paginator__link">Следующая страница</a></li>
            </ul>
        </main>

        <?php include 'left_block.php' ?>

        </div>
	</div>

        <?php include 'template_footer.php' ?>
