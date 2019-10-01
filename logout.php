<?php

include __DIR__ . '/src/initPage.php';

new initPage('logout');

header("Location: /shop/index.php");