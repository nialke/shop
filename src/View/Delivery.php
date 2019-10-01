<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link rel="Stylesheet" href="/shop/public/css/bootstrap.min.css">
    <script src="/shop/public/js/bootstrap.min.js"></script>

    <title>Zamów produkt</title>
</head>
<body>
    <?php include __DIR__ . '/Menu.php'; ?>

        <div class="container" style="width: 40%; margin-top: 2%">
            <h1>Zamów produkt</h1>

            Zamawiany przedmiot: <br>
            <?php echo $product->getBrand() . " " . $product->getModel() . ", cena: " . $product->getPrice() . "zł" ?><br><br>

        <form action="/shop/account/DeliveryRequest.php" method="post">
            <div class="form-group">
                <label for="formGroupExampleInput">Imię i nazwisko</label>
                <input type="text" name="name_surname" class="form-control"  placeholder="Imię i nazwisko">
            </div>
            <div class="form-group">
                <label for="formGroupExampleInput2">Ulica</label>
                <input type="text" name="street" class="form-control"  placeholder="Ulica">
            </div>
            <div class="form-group">
                <label for="formGroupExampleInput3">Numer domu</label>
                <input type="text" name="house" class="form-control"  placeholder="Numer domu">
            </div>
            <div class="form-group">
                <label for="formGroupExampleInput4">Numer mieszkania</label>
                <input type="text" name="flat" class="form-control"  placeholder="Numer mieszkania">
            </div>
            <div class="form-group">
                <label for="formGroupExampleInput5">Kod pocztowy</label>
                <input type="text" name="postcode" class="form-control"  placeholder="Kod pocztowy">
            </div>
            <div class="form-group">
                <label for="formGroupExampleInput6">Miasto</label>
                <input type="text" name="city" class="form-control"  placeholder="Miasto">
            </div>
            <div class="form-group">
                <label for="formGroupExampleInput6">Sposób dostawy</label>
                <select name="delivery_method" class="custom-select custom-select-sm">
                    <option selected>Sposób dostawy</option>
                    <option value="poczta_polska">Poczta Polska</option>
                    <option value="kurier">Kurier</option>
                </select>
            </div>
            <input type="hidden" name="productId" value="<?php echo $product->getId() ?>">
            <button type="submit" class="btn btn-primary">Zamawiam</button>
        </form>
        </div>

</body>
</html>