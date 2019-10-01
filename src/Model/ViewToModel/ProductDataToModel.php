<?php


namespace src\Model\ViewToModel;

use src\Model\Entities\Product;

class ProductDataToModel
{
    public function productDataMapper(array $productData): Product
    {
        $product = new Product();
        $product->setBrand($productData['brand']);
        $product->setModel($productData['model']);
        $product->setColor($productData['color']);
        $product->setDescription($productData['description']);
        $product->setPrice((float)$productData['price']);
        $product->setAmount((int)$productData['amount']);
        $product->setPicture($productData['picture']);

        return $product;
    }
}