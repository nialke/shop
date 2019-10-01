<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link rel="Stylesheet" href="/../../shop/public/css/bootstrap.min.css">
    <script src="/../../shop/public/js/bootstrap.min.js"></script>

    <title>Moje zamówienia</title>
</head>
<body>
<?php include __DIR__ . '/Menu.php'; ?>

<div class="container">
<h1>Moje zamówienia</h1>

    <table style="margin-top: 2%" class="table table-sm">
        <thead>
        <tr>
            <th scope="col">Zamówiony przedmiot</th>
            <th scope="col">Cena</th>
            <th scope="col">Data zamówienia</th>
            <th scope="col">Status zamówienia</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($userOrdersArray as $arrayNumber => $arrayOrder) { ?>
        <tr>
            <td> <?php echo $arrayOrder['product_brand'] . " " . $arrayOrder['product_model']  ?> </td>
            <td> <?php echo $arrayOrder['product_price'] . "zł"?> </td>
            <td> <?php echo $arrayOrder['date'] ?> </td>
            <td> <?php echo $arrayOrder['status'] ?> </td>
        </tr>
        <?php } ?>
        </tbody>
    </table>
</div>


</body>
</html>

