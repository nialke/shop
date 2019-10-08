<?php

namespace src\Controller;

use src\Model\DatabaseRequests\OrdersRequest;
use src\Model\DatabaseRequests\ProductRequest;
use src\Model\Entities\Orders;
use src\Model\Services\getProductIDFromHomePage;
use src\Model\System\Controller;
use src\Model\Entities\Product;
use src\Model\Validation\OrderValidation;
use src\Model\Validation\UserValidation;
use src\Model\Validation\ValidationStatus;
use src\Model\ViewToModel\ProductDataToModel;

class AccountPage extends Controller
{
    public function accountPage()
    {
        $user = $this->getLoggedUser();
        $userValidation = new UserValidation();
        $validateIsLogged = $userValidation->validateIsLogged($user);
        if ($validateIsLogged->getStatus() == ValidationStatus::STATUS_SUCCESS) {

            include __DIR__ . '/../View/AccountPage.php';
        } else {
            foreach ($validateIsLogged->getMessageList() as $errorMessage) {
                echo $errorMessage;
            }
        }
    }

    public function myOrders()
    {
        $user = $this->getLoggedUser();
        $userValidation = new UserValidation();
        $validateIsLogged = $userValidation->validateIsLogged($user);
        if ($validateIsLogged->getStatus() == ValidationStatus::STATUS_SUCCESS) {
            $userOrdersArray = $this->getUsersOrders($user);
            include __DIR__ . '/../View/MyOrders.php';
        } else {
            foreach ($validateIsLogged->getMessageList() as $errorMessage) {
                echo $errorMessage;
            }
        }

    }

    public function delivery()
    {
        $user = $this->getLoggedUser();
        $product = $this->chooseProductFromHomePage();
        if ($product != NULL) {
            include __DIR__ . '/../View/Delivery.php';
        } else {
            echo 'Nie wybrano produktu do kupienia';
        }
    }

    public function deliveryRequest()
    {
        header('Content-Type: application/json');

        $user = $this->getLoggedUser();

        $userValidation = new UserValidation();
        $validateIsLogged = $userValidation->validateIsLogged($user);


        if ($validateIsLogged->getStatus() == ValidationStatus::STATUS_SUCCESS) {
            $userId = $user->getId();
            /**
             * get product which choose user
             **/
            $productId = $_POST['productId'];

            $orderValidation = new OrderValidation();
            $validateFormData = $orderValidation->validateFormData();
            if ($validateFormData->getStatus() == ValidationStatus::STATUS_SUCCESS) {

                $address = $_POST['name_surname'] . " " . $_POST['street'] . " " . $_POST['house'];
                if ($_POST['flat'] != NULL) {
                    $address = $address . " " . $_POST['flat'];
                }
                $address = $address . " " . $_POST['postcode'] . " " . $_POST['city'];

                $deliveryMethod = $_POST['delivery_method'];

                echo json_encode([
                    "status" => "success"
                ]);
                $order = $this->setOrder($userId, $productId, $address, $deliveryMethod);
                $orderRequest = new OrdersRequest();
                $orderRequest->setOrderToDB($order);
            } else {
                $messages = $validateFormData->getMessageList();
                echo json_encode([
                    "status" => "error",
                    "message" => $messages
                ]);
            }
        } else {
            foreach ($validateIsLogged->getMessageList() as $error) {
                echo $error;
            }
        }
    }

    private function chooseProductFromHomePage(): ?Product
    {
        $product = NULL;

        $productId = new getProductIDFromHomePage();
        $productId = $productId->getProductId();
        if ($productId != NULL) {
            $productRequest = new ProductRequest();
            $getProductById = $productRequest->getProductById($productId);
            $productDataToModel = new ProductDataToModel;
            $product = $productDataToModel->productDataMapper($getProductById[0]);
            $product->setId($productId);
        }
        return $product;
    }

    private function setOrder(int $userId, int $productId, string $address, string $deliveryMethod): Orders
    {
        $order = new Orders();
        $order->setUserId($userId);
        $order->setProductId($productId);
        $order->setAddress($address);
        $order->setDeliveryMethod($deliveryMethod);
        $order->defaultSettings();
        return $order;
    }

    private function getUsersOrders($user): array
    {
        $ordersRequest = new OrdersRequest();

        $userOrdersArray = $ordersRequest->getUserOrders($user);
        foreach ($userOrdersArray as $arrayNumber => $order) {
            $userOrdersArray[$arrayNumber]['product_brand'] = $order['brand'];
            $userOrdersArray[$arrayNumber]['product_model'] = $order['model'];
            $userOrdersArray[$arrayNumber]['product_price'] = $order['price'];
        }
        return $userOrdersArray;
    }
}