<?php include 'template_header.php' ?>
<div class="content">
    <div class="wrapper content__wrapper">
        <main class="inside-content">
            <nav class="bread-crumbs-container product__bread-crumbs">
                <ul class="bread-crumbs">
                <?php //вывод хлебных крошек и новостей
                    include "application/models/news-detail.php";
                    if ($res)
                    {
                        foreach ($res as $new)
                        {
                            echo '<li class="bread-crumb"><a class="bread-crumb__link" href="index.php">Главная</a></li>
                                <li class="bread-crumb"><a class="bread-crumb__link" href="news.php">Новости</a></li>
                                <li class="bread-crumb bread-crumb_current">'. $new["header"] .'</li>
                                </ul>
                            </nav>';
                            echo '<article class="shipment-article">
                                    <p><b>'. $new["date"] .'</b></p>
                                    <h1>'. $new["header"] .'</h1>
                                    <p>
                                        '. $new["description"] .'
                                    </p>
                                </article>';
                        }
                    }
                ?>
        </main>
        <?php include_once 'sidebar.php' ?>
    </div>
</div>
<?php include 'template_footer.php' ?>