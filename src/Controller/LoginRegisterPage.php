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
        $UserDataTransform = new UserDataToModel();
        $user = $UserDataTransform->userDataMapper($_POST);

        $userValidation = new UserValidation();
        $userValidationStatus = $userValidation->validateUser($user);

        if($userValidationStatus->getStatus() == ValidationStatus::STATUS_ERROR) {
            $messagesList = $userValidationStatus->getMessageList();
            foreach ($messagesList as $message) {
                echo $message . "<br>";
            }
            return;
        }

        $userRequest = new UserRequests();
        $userRequest->setUserToDB($user);
        echo "Witaj " . $user->getNick()
            . " w namszym sklepie, możesz się teraz bezpiecznie zalogować "
            . "<a href='/shop/login.php'>Logowanie</a>";
    }

    public function loginRequest()
    {
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
            foreach ($messageList as $message)
            {
                echo $message . "<br>";
            }
            return;
        }

        header("Location: //". $_SERVER['HTTP_HOST'] . "/shop");
    }
}