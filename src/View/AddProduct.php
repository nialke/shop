<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link rel="Stylesheet" href="/../../shop/public/css/bootstrap.min.css">
    <script src="/../../shop/public/js/jquery-3.4.1.js"></script>
    <script src="/../../shop/public/js/bootstrap.min.js"></script>
    <script src="/../../shop/public/js/addProduct.js"></script>

    <title>Dodaj produkt</title>
</head>
    <body>
        <?php include __DIR__ . '/Menu.php'; ?>
        <div class="container">
        <h1>Dodawanie produktu do bazy</h1>

        <div class="status-info" style="display: none;"></div>
        <form action="/shop/admin/AddProductRequest.php" method="get">
            <div class="form-group">
                <label for="formGroupExampleInput">Marka</label>
                <input id="addproduct_brand" type="text" name="brand" class="form-control"  placeholder="Marka">
            </div>
            <div class="form-group">
                <label for="formGroupExampleInput2">Model</label>
                <input id="addproduct_model" type="text" name="model" class="form-control"  placeholder="Model">
            </div>
            <div class="form-group">
                <label for="formGroupExampleInput3">Kolor</label>
                <input id="addproduct_color" type="text" name="color" class="form-control"  placeholder="Kolor">
            </div>
            <div class="form-group">
                <label for="formGroupExampleInput4">Opis</label>
                <input id="addproduct_description" type="text" name="description" class="form-control"  placeholder="Opis">
            </div>
            <div class="form-group">
                <label for="formGroupExampleInput5">Cena</label>
                <input id="addproduct_price" type="text" name="price" class="form-control"  placeholder="Cena">
            </div>
            <div class="form-group">
                <label for="formGroupExampleInput5">Ilość w magazynie</label>
                <input id="addproduct_amount" type="number" name="amount" class="form-control"  placeholder="Ilość w magazynie">
            </div>
            <div class="form-group">
                <label for="formGroupExampleInput6">Obraz</label>
                <input id="addproduct_picture" type="text" name="picture" class="form-control"  placeholder="Obraz">
            </div>
            <button id="send_addproduct" type="button" class="btn btn-primary">Dodaj produkt</button>
        </form>
            
        </div>


    </body>
</html>

