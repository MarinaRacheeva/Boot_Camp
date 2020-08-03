<?php 
require 'template/header.php';
if ($_GET['id']) 
{
    $sql = "SELECT id FROM News";
    $res = mysqli_query($link, $sql);
    foreach ($res as $new)
    {
        $mas_new[] = $new['id'];
    }
    if (!in_array($_GET['id'], $mas_new))
    {
        header($_SERVER['SERVER_PROTOCOL'] . ' 404 Not Found');
        header('Location: 404.php');
    }
}
else {
    header($_SERVER['SERVER_PROTOCOL'] . ' 404 Not Found');
    header('Location: 404.php');
}
?> 
<main class="inside-content">
    <nav class="bread-crumbs-container product__bread-crumbs">
        <ul class="bread-crumbs">
            <? 
            function clearInt($data){
                return abs((int)$data);
            }
            // выбор всех новостей по id
            $id = clearInt($_GET['id']);
            $sql = "SELECT * FROM News WHERE id = $id";
            $res = mysqli_query($link, $sql);
            
            //вывод хлебных крошек и новостей
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
<? require 'template/sidebar.php' ?>
    </div>
</div>
<? require 'template/footer.php' ?>