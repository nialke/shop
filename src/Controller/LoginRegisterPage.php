<?php

namespace src\Controller;

use src\Model\System\Controller;
use src\Model\Validation\ValidationStatus;
use src\Model\ViewToModel\UserDataToModel;
use src\Model\DatabaseRequests\UserRequests;
use src\Model\Validation\UserValidation;
use src\Model\UserSession\LoginLogoutService;

class LoginRegisterPage extends Controller
{
    public function login()
    {
        $user = $this->getLoggedUser();
        if($user != null) {
             header("Location: ". $_SERVER['HTTP_HOST'] . "/shop/");
        }
        include __DIR__ .'/../View/LoginPage.php';
    }

    public function register()
    {
        $user = $this->getLoggedUser();
        if($user != null) {
            header("Location: ". $_SERVER['HTTP_HOST'] . "/shop/");
        }
        include __DIR__ .'/../View/RegisterPage.php';
    }

    public function registerRequest()
    {
        header('Content-Type: application/json');

        $UserDataTransform = new UserDataToModel();
        $user = $UserDataTransform->userDataMapper($_POST);

        $userValidation = new UserValidation();
        $userValidationStatus = $userValidation->validateUser($user);

        if($userValidationStatus->getStatus() == ValidationStatus::STATUS_ERROR) {
            $messagesList = $userValidationStatus->getMessageList();
            echo json_encode([
                "status" => "error",
                "errors" => $messagesList
            ]);
            return;
        }

        echo json_encode([
            "status" => "success"
        ]);

        $userRequest = new UserRequests();
        $userRequest->setUserToDB($user);
    }

    public function loginRequest()
    {
        header('Content-Type: application/json');

        $userDataTransform = new UserDataToModel();
        $user = $userDataTransform->userDataMapper($_POST);

        $userValidation = new UserValidation();
        $validateStatus = $userValidation->validateLogin($user);

        if ($validateStatus->getStatus() == ValidationStatus::STATUS_SUCCESS)
        {
            $userRequest = new UserRequests();
            $getUserDataFromDB = $userRequest->getUserDataFromDB($user);
            $user = $userDataTransform->userAllDataMapper($getUserDataFromDB, $user);
            $loginLogoutService = new LoginLogoutService();
            $loginLogoutService->login($user);
        }
        else
        {
            $messageList = $validateStatus->getMessageList();
            echo json_encode([
                "status" => "error",
                "errors" => $messageList,
            ]);
            return;
        }

        echo json_encode([
            "status" => "success",
        ]);
    }
}