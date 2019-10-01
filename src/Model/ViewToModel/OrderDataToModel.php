<?php


namespace src\Model\ViewToModel;

use src\Model\Entities\Orders;

class ProductDataToModel
{
    public function orderDataMapper(array $orderData): Orders
    {
        $order = new Orders();
        $order->setDeliveryMethod($orderData['delivery_method']);
        $order->setAddress($orderData['address']);
        $order->setProductId($orderData['product_id']);
        $order->setUserId($orderData['user_id']);
        return $order;
    }
}