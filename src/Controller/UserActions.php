<?php

namespace src\Controller;

use src\Model\UserSession\LoginLogoutService;

class UserActions
{
    public function logout()
    {
        $logout = new LoginLogoutService();
        $logout->logout();
    }
}
