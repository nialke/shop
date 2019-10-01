<?php


namespace src\Model\DatabaseRequests;

use src\Model\System\Database;
use src\Model\Entities\Product;

class ProductRequest
{
    public function setProductToDB (Product $product)
    {
        $db = new Database();

        $query = "INSERT INTO `product`(`brand`, `model`, `color`, `description`, `price`, `amount`, `picture`)
                VALUES (:brand, :model, :color, :description, :price, :amount, :picture);";
        $parameters = [
            "brand" => $product->getBrand(),
            "model" => $product->getModel(),
            "color" => $product->getColor(),
            "description" => $product->getDescription(),
            "price" => $product->getPrice(),
            "amount" => $product->getAmount(),
            "picture" => $product->getPicture(),
        ];

        return $db->execute($query, $parameters);
    }

    public function getAllProduct()
    {
        $db = new Database;
        $query = "SELECT * FROM `product`;";

        return $db->execute($query);
    }

    public function getProductById(int $productId)
    {
        $db = new Database();
        $query = "SELECT * FROM `product` WHERE `id` = :productId;";
        $parameter = [
            "productId" => $productId,
        ];
        return $db->execute($query, $parameter);
    }


}