<?php
include __DIR__ . "/../vendor/autoload.php";

use src\Controller\HomePage;
use src\Controller\LoginRegisterPage;
use src\Controller\AdminPage;
use src\Controller\AccountPage;
use src\Controller\UserActions;

class initPage
{
    public function __construct($pageName)
    {
        switch ($pageName) {
            case 'home':
                $homePage = new HomePage();
                $homePage->home();
                break;
            case 'login':
                $loginPage = new LoginRegisterPage();
                $loginPage->login();
                break;
            case 'register':
                $loginPage = new LoginRegisterPage();
                $loginPage->register();
                break;
            case 'registerRequest':
                $registerPage = new LoginRegisterPage();
                $registerPage->registerRequest();
                break;
            case 'loginRequest':
                $loginPage = new LoginRegisterPage();
                $loginPage->loginRequest();
                break;
            case 'logout':
                $logout = new UserActions();
                $logout->logout();
                break;
            case 'admin':
                $adminPage = new AdminPage();
                $adminPage->adminPage();
                break;
            case 'addProduct':
                $addProduct = new AdminPage();
                $addProduct->addProduct();
                break;
            case 'addProductRequest':
                $addProductRequest = new AdminPage();
                $addProductRequest->addProductRequest();
                break;
            case 'account':
                $accountPage = new AccountPage();
                $accountPage->accountPage();
                break;
            case 'myOrders':
                $myOrders = new AccountPage();
                $myOrders->myOrders();
                break;
            case 'delivery':
                $delivery = new AccountPage();
                $delivery->delivery();
                break;
            case 'deliveryRequest':
                $deliveryRequest = new AccountPage();
                $deliveryRequest->deliveryRequest();
                break;
        }
    }
}
