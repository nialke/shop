<!doctype html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport"
              content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">

        <link rel="Stylesheet" href="public/css/bootstrap.min.css">
        <script src="public/js/bootstrap.min.js"></script>

        <title>Zaloguj się</title>
    </head>
    <body>
     <?php include __DIR__ . '/Menu.php'; ?>

        <div class="container" style="width: 20%; margin-top: 5%">
            <h1>Logowanie</h1>
            <br>
             <form action="/shop/loginRequest.php" method="post">
                 <div class="form-group" width="200px">
                     <label for="exampleInputEmail1">Podaj nick</label>
                     <input type="text" class="form-control" name="nick" placeholder="Nick">
                 </div>
                 <div class="form-group">
                     <label for="exampleInputPassword1">Podaj hasło</label>
                     <input type="password" class="form-control" name="password" placeholder="Hasło">
                 </div>
                 <button type="submit" class="btn btn-primary">Zaloguj</button>
             </form>
        </div>

    </body>
</html>