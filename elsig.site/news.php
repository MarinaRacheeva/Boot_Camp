<?php include 'template_header.php' ?>
<div class="content">
    <div class="wrapper content__wrapper">
        <main class="inside-content">
            <h1 class="contacts-page__main-headline">Новости</h1>
            <?php //вывод новостей в рабочей области
                include "application/models/news.php";
                foreach ($res as $new)
                { 
                    echo '<li class="news-item">
                            <a class="news-item__link" href="news-detail.php?id='. $new["id"] .'">'. $new["header"] .'</a>
                            <span class="news-item__date">' . $new["date"] . '</span>   
                            <span class="news-item__preview">' . $new["preview"] . '</span>   
                        </li>';
                }
            ?>
            <ul class="paginator catalog-page__paginator">
            <? //пагинация новостей
                if ($kol_page > 1)   
                {
                    for ($i = 1; $i <= $kol_page; $i++)
                    {
                        if ($i == $active) 
                            echo '<li class="paginator__elem paginator__elem_current"><span class="paginator__link">'.$i. '</span></li>';
                        else 
                            echo '<li class="paginator__elem"><a href=news.php' . $q.$i.'> '.$i. '</a></li>';
                    }
                    if ($active != $kol_page)
                        echo '<li class="paginator__elem paginator__elem_next"><a href="' . $q.$next . '" class="paginator__link">Следующая страница</a></li>';
                    else
                        echo '<li class="hidden paginator__elem paginator__elem_next"><span class="paginator__link">Следующая страница</span></li>';
                }
            ?>
            </ul>
        </main>

        <?php include 'sidebar.php' ?>
    </div>
</div>
<?php include 'template_footer.php' ?>