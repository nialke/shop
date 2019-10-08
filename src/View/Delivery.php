<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link rel="Stylesheet" href="/shop/public/css/bootstrap.min.css">
    <script src="/shop/public/js/jquery-3.4.1.js"></script>
    <script src="/shop/public/js/bootstrap.min.js"></script>
    <script src="/shop/public/js/delivery.js"></script>

    <title>Zamów produkt</title>
</head>
<body>
    <?php include __DIR__ . '/Menu.php'; ?>

        <div class="container" style="width: 40%; margin-top: 2%">
            <h1>Zamów produkt</h1>

            Zamawiany przedmiot: <br>
            <?php echo $product->getBrand() . " " . $product->getModel() . ", cena: " . $product->getPrice() . "zł" ?><br><br>

            <div class="status-info"></div>
        <form class="form" action="/shop/account/DeliveryRequest.php" method="post">
            <div class="form-group">
                <label for="formGroupExampleInput">Imię i nazwisko</label>
                <input id="delivery_name_surname" type="text" name="name_surname" class="form-control"  placeholder="Imię i nazwisko">
            </div>
            <div class="form-group">
                <label for="formGroupExampleInput2">Ulica</label>
                <input id="delivery_street" type="text" name="street" class="form-control"  placeholder="Ulica">
            </div>
            <div class="form-group">
                <label for="formGroupExampleInput3">Numer domu</label>
                <input id="delivery_house" type="text" name="house" class="form-control"  placeholder="Numer domu">
            </div>
            <div class="form-group">
                <label for="formGroupExampleInput4">Numer mieszkania</label>
                <input id="delivery_flat" type="text" name="flat" class="form-control"  placeholder="Numer mieszkania">
            </div>
            <div class="form-group">
                <label for="formGroupExampleInput5">Kod pocztowy</label>
                <input id="delivery_postcode" type="text" name="postcode" class="form-control"  placeholder="Kod pocztowy">
            </div>
            <div class="form-group">
                <label for="formGroupExampleInput6">Miasto</label>
                <input id="delivery_city" type="text" name="city" class="form-control"  placeholder="Miasto">
            </div>
            <div class="form-group">
                <label for="formGroupExampleInput6">Sposób dostawy</label>
                <select id="delivery_method" name="delivery_method" class="custom-select custom-select-sm">
                    <option selected value=0 >Sposób dostawy</option>
                    <option value="poczta_polska">Poczta Polska</option>
                    <option value="kurier">Kurier</option>
                </select>
            </div>
            <input id ="delivery_product_id" type="hidden" name="productId" value="<?php echo $product->getId() ?>">
            <button id="send_delivery" type="submit" class="btn btn-primary">Zamawiam</button>
        </form>
        </div>

</body>
</html>