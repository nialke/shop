<?php

namespace src\Controller;

use src\Model\DatabaseRequests\ProductRequest;
use src\Model\System\Controller;
use src\Model\Validation\ProductValidation;
use src\Model\Validation\UserValidation;
use src\Model\Validation\ValidationStatus;
use src\Model\ViewToModel\ProductDataToModel;

class AdminPage extends Controller
{
    public function adminPage()
    {
        $user = $this->getLoggedUser();
        $userValidation = new UserValidation();
        $adminValidation = $userValidation->validateAdmin($user);
        if ($adminValidation->getStatus() == ValidationStatus::STATUS_SUCCESS) {
            include __DIR__ . '/../View/AdminPage.php';
        }
        else {
            foreach ($adminValidation->getMessageList() as $message) {
                echo $message;
            }
        }
    }

    public function addProduct()
    {
        $user = $this->getLoggedUser();
        $userValidation = new UserValidation();
        $adminValidation = $userValidation->validateAdmin($user);
        if ($adminValidation->getStatus() == ValidationStatus::STATUS_SUCCESS) {
            include __DIR__ . '/../View/AddProduct.php';
        }
        else {
            foreach ($adminValidation->getMessageList() as $message) {
                echo $message;
            }
        }
    }

    public function addProductRequest()
    {
        $user = $this->getLoggedUser();

        $userValidation = new UserValidation();
        $validateAdmin = $userValidation->validateAdmin($user);

        $productDataTransform = new ProductDataToModel();
        $product = $productDataTransform->productDataMapper($_GET);

        $productValidation = new ProductValidation();
        $validateProduct = $productValidation->validateProduct($product);

        if ($validateAdmin->getStatus() == ValidationStatus::STATUS_SUCCESS
            && $validateProduct->getStatus() == ValidationStatus::STATUS_SUCCESS)
        {
            $productRequest = new ProductRequest();
            $productRequest->setProductToDB($product);
            echo "Dodano poprawnie";
        }
        else
        {
            $validateAdminMessages = $validateAdmin->getMessageList();
            $validateProductMessages = $validateProduct->getMessageList();
            foreach ($validateAdminMessages as $message)
            {
                echo $message . "<br>";
            }
            foreach ($validateProductMessages as $message)
            {
                echo $message . "<br>";
            }
        }
    }

}