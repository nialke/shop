<nav class="navbar navbar-expand-lg navbar-light bg-light">

    <a href="/shop/" class="navbar-brand">Sklep z telefonami</a>

    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" href="/shop/">Home</a>
            </li>
            <li class="nav-item">
                <?php if ($user != NULL) { ?>
                <a class="nav-link" href="/shop/account.php">Konto</a>
                <?php } ?>
            </li>
            <li class="nav-item">
                <?php if ($user != NULL && $user->getType() == 1) { ?>
                    <div><a class="nav-link" href="/shop/admin.php">Admin</a></div>
                <?php } ?>
            </li>
        </ul>
    </div>

    
    <div class="navbar-collapse collapse w-100 order-3 dual-collapse2">
        <ul class="navbar-nav ml-auto">
            <li class="nav-item">
                <a class="nav-link" href="#">
                    <?php if($user == null): ?>
                        <a class="nav-link" href="/shop/login.php">Zaloguj się</a>
                    <?php else: ?>
                        <a href="/shop/account.php" class="nav-link"><?=$user->getNick(); ?></a>
                    <?php endif; ?>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">
                    <?php if($user == null): ?>
                        <a class="nav-link" href="/shop/register.php">Zarejestruj się</a>
                    <?php else: ?>
                        <a class="nav-link" href="/shop/logout.php">Wyloguj się</a>
                    <?php endif; ?>
                </a>
            </li>
        </ul>
    </div>
</nav>