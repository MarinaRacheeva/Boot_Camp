<div class="sidebar">
    <section class="catalog">
        <h2 class="sidebar__headline">Каталог</h2>
        <ul class="catalog-list">
            <? //вывод категорий в сайдбаре
             $sql = "SELECT id, name FROM Category";
             $res = mysqli_query($link, $sql);
				foreach ($res as $cat)
					echo '<li class="catalog-list__item"><a class="catalog-list__link" href="catalog.php?cat_id='. $cat["id"] .'">'.$cat["name"].'</a></li>';
			?>
        </ul>
    </section>
    <section class="news">
        <h2 class="sidebar__headline news__headline">Новости</h2>
        <ul class="news-list">
            <? //вывод новостей в сайдбаре
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