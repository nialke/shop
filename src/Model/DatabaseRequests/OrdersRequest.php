<?php


namespace src\Model\DatabaseRequests;

use src\Model\System\Database;
use src\Model\Entities\Orders;
use src\Model\Entities\User;

class OrdersRequest
{
    public function setOrderToDB(Orders $order)
    {
        $db = new Database();
        $query = "INSERT INTO `orders`(`user_id`, `product_id`, `address`, `delivery_method`,`date`) VALUES (:userId, :productId, :address, :deliveryMethod, :orderDate);";
        $parameters = [
            "userId" => $order->getUserId(),
            "productId" => $order->getProductId(),
            "address" => $order->getAddress(),
            "deliveryMethod" => $order->getDeliveryMethod(),
            "orderDate" => $order->getDate()->format("Y-m-d H:i:s"),
        ];

        return $db->execute($query, $parameters);
    }

    public function getUserOrders(User $user): array
    {
        $db = new Database();
        $query = "
            SELECT 
            o.date,
            o.status,
            o.address,
            o.delivery_method,
            p.brand,
            p.model,
            p.price
            FROM orders o
            join product p on o.product_id = p.id
            where o.user_id = :userId";
        $parameter = [
            "userId" => $user->getId(),
        ];

        return $db->execute($query, $parameter);
    }


}