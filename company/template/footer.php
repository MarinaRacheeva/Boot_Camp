<?php
setlocale(LC_ALL, "russian");
$year = strftime('%Y');
?>

<div class="sidebar">
    <?//// если категорий нету, то <section> не должен выводиться +
    /// тут та же история, что с главной страницей+
    //// вот этот кусок кода должен разделиться на 2: в модели ты дёргаешь функцию из lib.php, которая выбирает в массив категории+
    /// далее этот массив видит подключённая вьюха главной страницы, которая генерирует нужный html+
    /// естественно, категории надо выбрать 1 раз и дальше везде работать с этим массивом — и тут и на главной+
    $sidebar = "SELECT id, name, image FROM Category";
    $categories = getResult($sidebar);
    if ($categories):?>
    <section class="catalog">
        <h2 class="sidebar__headline">Каталог</h2>
        <ul class="catalog-list">
            <? //вывод категорий в сайдбаре            
				foreach ($categories as $cat):?>
					<li class="catalog-list__item"><a class="catalog-list__link" href="catalog.php?cat_id=<?=$cat["id"]?>"><?=$cat["name"]?></a></li>
                <?endforeach;?>
        </ul>
    </section>
    <?endif;?>
    <?//// если новостей нету, то <section> не должен выводиться
    /// та же история, что выше ?>
    <section class="news">
        <h2 class="sidebar__headline news__headline">Новости</h2>
        <ul class="news-list">
            <? //вывод новостей в сайдбаре
                //// константы должны уехать в config.php
                define("KOL_NEWS_SB", 6); //количество новостей в сайдбаре
                $sql_sb = 'SELECT id, header, date FROM News ORDER BY date DESC LIMIT '.KOL_NEWS_SB;
                $res_sb = mysqli_query($link, $sql_sb);
				foreach ($res_sb as $new)
				{
					echo '<li class="news-item">
							<a class="news-item__link" href="news-detail.php?id='. $new["id"] .'">'. $new["header"] .'</a>
							<span class="news-item__date">' . $new["date"] . '</span>   
						</li>';
				}
			?>
        </ul>
        <span class="archive"><a class="archive__link" href="news.php">Архив новостей</a></span>
    </section>
</div>

<? $page_name = str_replace('.php', '', $_SERVER[SCRIPT_NAME]);
if (file_exists('application/views/include_areas/'.$page_name.'_seo.php')) include 'application/views/include_areas/'.$page_name.'_seo.php';?>
</div>
</div>
<footer class="page-footer">
    <div class="wrapper page-footer__wrapper">
        <div class="copyright">
            <span class="copyright__part copyright__lifetime">Copyright ©2007-
                <?echo $year;?></span>
            <span class="copyright__part copyright__company-lifetime"><b>© "Company"</b>,
                <?echo $year;?></span>
            <img class="copyright__image" src="img/logo.png" alt="Company-logo">
            <span class="copyright__part copyrhigt__company-name">Company</span>
        </div>
        <nav class="footer-nav">
            <ul class="footer-nav__list">
                <?  //вывод меню в подвале сайта
                    foreach($menu as $address => $title):
                        if ($title == 'Новость'): break;
                        else:?>
                <li class="footer-nav__list-item"><a class="footer-nav__link" href="<?=$address?>"><?=$title?></a></li>
                <?endif?>
                <?endforeach?>

            </ul>
        </nav>
        <div class="developer">
            <span class="developer__ref">Разработка сайта - <a class="developer__link"
                    href="http://itconstruct.ru">ITConstruct</a></span>
            <img class="counter" src="img/counter.png" alt="Page-counter">
        </div>
    </div>
</footer>
</body>

</html>