<!doctype html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport"
              content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">

        <link rel="Stylesheet" href="public/css/bootstrap.min.css">
        <script src="public/js/bootstrap.min.js"></script>

        <title>Sklep z telefonami</title>
    </head>
    <body>

        <?php include __DIR__ . '/Menu.php'; ?>

        <div class="container">
            <div class="item content">
                <br>
                <h1>Spis telefonów do kupienia:</h1>
                <br>

                <div class="list-group">
                     <?php foreach ($products as $product):?>
                        <a href="#" class="list-group-item list-group-item-action">
                            <p><?= $product->getBrand(); ?></p>
                            <p><?= $product->getModel(); ?></p>
                            <p><?= $product->getDescription(); ?></p>
                            <a class="btn btn-secondary" href="/shop/account/Delivery.php?productId=<?php echo $product->getId() ?>">Kup Teraz</a>
                        </a><br>
                    <?php endforeach; ?>
                </div>

            </div>
        </div>


    </body>
</html>