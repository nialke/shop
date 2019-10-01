<?php

namespace src\Model\Services;

use src\Model\DatabaseRequests\ProductRequest;
use src\Model\Entities\Product;

class getAllProductsListService
{
    /**
     * @return Product[]
     */
    public function getAllProducts(): array
    {
        $productRequest = new ProductRequest();
        $productsFromDb = $productRequest->getAllProduct();

        $productList = [];
        foreach($productsFromDb as $productArray) {
            $productList[] = $this->getProductDetails($productArray);
        }
        return $productList;
    }

    private function getProductDetails($productArray): Product
    {
        $product = new Product();
        foreach ($productArray as $key => $value) {
            switch ($key) {
                case 'id':
                    $product->setId($value);
                    break;
                case 'brand':
                    $product->setBrand($value);
                    break;
                case 'model':
                    $product->setModel($value);
                    break;
                case 'color':
                    $product->setColor($value);
                    break;
                case 'description':
                    $product->setDescription($value);
                    break;
                case 'price':
                    $product->setPrice($value);
                    break;
                case 'amount':
                    $product->setAmount($value);
                    break;
                case 'picture':
                    $product->setPicture($value);
                    break;
            }
        }
        return $product;
    }
}
