<?php
setlocale(LC_ALL, "russian");
$year = strftime('%Y');
?>
</main>
<div class="sidebar">
    <?
    $categories = getCategories();
    if ($categories):?>
    <section class="catalog">
        <h2 class="sidebar__headline">Каталог</h2>
        <ul class="catalog-list">
            <?//вывод категорий в сайдбаре 
				foreach ($categories as $cat):?>
					<li class="catalog-list__item"><a class="catalog-list__link" href="catalog.php?cat_id=<?=$cat["id"]?>"><?=$cat["name"]?></a></li>
                <?endforeach;?>
        </ul>
    </section>
    <?endif;?>
    <?
    $news = getNews();
    if ($news):?>
    <section class="news">
        <h2 class="sidebar__headline news__headline">Новости</h2>
        <ul class="news-list">
            <? //вывод новостей в сайдбаре
				foreach ($news as $new):?>
					<li class="news-item">
						<a class="news-item__link" href="news-detail.php?id=<?=$new["id"]?>"><?=$new["header"]?></a>
						<span class="news-item__date"><?=$new["date"]?></span>   
					</li>
				<?endforeach;?>
        </ul>
        <span class="archive"><a class="archive__link" href="news.php">Архив новостей</a></span>
    </section>
    <?endif;?>
</div>
<? //вывод seo-текстов, если они есть 
$page_name = str_replace('.php', '', $_SERVER[SCRIPT_NAME]);
if (file_exists('application/views/include_areas/'.$page_name.'_seo.php')):?>
<article class="seo-article">
    <?include 'application/views/include_areas/'.$page_name.'_seo.php';?>
</article>
<?endif;?>
</div>
</div>
<footer class="page-footer">
    <div class="wrapper page-footer__wrapper">
        <div class="copyright">
            <span class="copyright__part copyright__lifetime">Copyright ©2007-
                <?=$year;?></span>
            <span class="copyright__part copyright__company-lifetime"><b>© "Company"</b>,
                <?=$year;?></span>
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