<?php include 'template_header.php' ?>

<div class="content content__product">
    <div class="wrapper content__wrapper">
        <main class="inside-content">
            <nav class="bread-crumbs-container product__bread-crumbs">
                <ul class="bread-crumbs">
                    <li class="bread-crumb"><a class="bread-crumb__link" href="index.php">Главная</a></li>
                    <li class="bread-crumb"><a class="bread-crumb__link" href="catalog.php">Каталог</a></li>
                    <li class="bread-crumb"><a class="bread-crumb__link" href="#">Электронные сигареты</a></li>
                    <li class="bread-crumb bread-crumb_current">Электронная сигарета «Такая-то»</li>
                </ul>
            </nav>
            <?php  include 'application/models/product.php' ?>

        </main>


        <?php include 'left_block.php' ?>

    </div>
</div>

<?php include 'template_footer.php' ?>