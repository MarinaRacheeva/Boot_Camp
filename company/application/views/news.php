<?php 
require 'application/models/news.php';
require 'includes/template_header.php';?>
    <h1 class="contacts-page__main-headline">Новости</h1>
    <?//вывод новостей в рабочей области
            foreach ($news as $new):?>
                <li class="news-item">
                    <a class="news-item__link" href="news-detail.php?id=<?=$new["id"]?>"><?=$new["header"]?></a>
                        <span class="news-item__date"><?=$new["date"]?></span>   
                        <span class="news-item__preview"><?=$new["preview"]?></span>   
                    </li>
            <?endforeach;?>         
    <ul class="paginator catalog-page__paginator">
        <?//вывод постраничной навигации новостей
        if ($kol_page > 1):
            for ($i = 1; $i <= $kol_page; $i++):
                if ($i == $active):?>
                    <li class="paginator__elem paginator__elem_current"><span class="paginator__link"><?=$i?></span></li>
                <?else:?>
                    <li class="paginator__elem"><a href=news.php<?=$q.$i?>><?=$i?></a></li>
                <?endif;?>
            <?endfor;?>
            <?if ($active != $kol_page):?>
                <li class="paginator__elem paginator__elem_next"><a href="<?=$q.$next?>" class="paginator__link">Следующая страница</a></li>
            <?else:?>
                <li class="hidden paginator__elem paginator__elem_next"><span class="paginator__link">Следующая страница</span></li>
            <?endif;?>
        <?endif;?>
    </ul>
<? require 'includes/template_footer.php' ?>