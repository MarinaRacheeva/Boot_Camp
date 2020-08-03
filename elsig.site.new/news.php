<?php 
require 'template/header.php';
?> 
<main class="inside-content">
    <h1 class="contacts-page__main-headline">Новости</h1>
    <? 
        // задаем параметры для пагинации по новостям
        define("KOL_NEWS", 6); //количество новостей на странице
        $page = 1;
        $input_page = abs((int)$_GET['page']);
        if (isset($_GET['page'])){
            $page = $input_page;
        }

        $active = $input_page;
        $next = $active + 1;
        $start = ($page * KOL_NEWS) - KOL_NEWS;

        // выбор всех новостей
        $sql = "SELECT id, header, date, preview FROM News ORDER BY date DESC LIMIT $start, ". KOL_NEWS;
        $res = mysqli_query($link, $sql);

        // условия для пагинации
        $total = mysqli_num_rows(mysqli_query($link, "SELECT * FROM News"));
        $kol_page = ceil($total / KOL_NEWS);
        $strq = strstr($_SERVER['QUERY_STRING'], 'page');
        $strq1 = explode('page', $strq);
        if (!$_SERVER['QUERY_STRING'])
            $q = '?page=';  
        else
            $q = $strq1[0] . '?page=';
        
            //вывод новостей в рабочей области
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
            <? //вывод постраничной навигации новостей
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
<? require 'template/sidebar.php' ?>
    </div>
</div>
<? require 'template/footer.php' ?>