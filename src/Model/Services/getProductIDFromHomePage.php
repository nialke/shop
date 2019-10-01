<?php


namespace src\Model\Services;


class getProductIDFromHomePage
{
    public function getProductId(): ?int
    {
        if ($_GET != null && isset($_GET['productId'])) {
            return (int)$_GET['productId'];
        }
        else {
            return NULL;
        }
    }
}