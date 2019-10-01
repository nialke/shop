<?php

namespace src\Controller;

use src\Model\Entities\Product;
use src\Model\System\Controller;
use src\Model\Services\getAllProductsListService;

class HomePage extends Controller
{
    /**
     * show home page
     */
    public function home()
    {
        $user = $this->getLoggedUser();
        $products = $this->getProductsList();
        include __DIR__ . '/../View/HomePage.php';
    }

    /**
     * @return Product[]
     */
    private function getProductsList(): array
    {
        $productService = new getAllProductsListService();
        return $productService->getAllProducts();
    }
}