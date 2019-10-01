<!doctype html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport"
              content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">

        <link rel="Stylesheet" href="public/css/bootstrap.min.css">
        <script src="public/js/bootstrap.min.js"></script>

        <title>Administrowanie</title>
    </head>
    <body>
    <?php include __DIR__ . '/Menu.php'; ?>

    <div class="container" style="margin-top: 2%">
        <h1>Panel administracyjny</h1>
        <div class="list-group" style="margin-top: 2%">
            <a href="admin/AddProduct.php" class="list-group-item list-group-item-action">Dodaj produkt</a>
        </div>
    </div>

    </body>
</html>