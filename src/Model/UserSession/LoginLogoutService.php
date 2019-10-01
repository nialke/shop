<?php

namespace src\Model\UserSession;

use src\Model\Entities\User;

class LoginLogoutService
{
    public function __construct()
    {
        session_start();
    }

    public function login(User $user)
    {
        $_SESSION['user'] = $user;
    }

    public function logout()
    {
        $_SESSION['user'] = null;
        session_unset();
        session_destroy();
    }
}
