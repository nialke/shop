<?php

namespace src\Model\UserSession;

use src\Model\Entities\User;

class UserSession
{
    public function __construct()
    {
        if(!isset($_SESSION)) {
            session_start();
        }
    }

    public function checkUserIsLogged(): bool
    {
        return isset($_SESSION['user']) && $_SESSION['user'] != null;
    }

    public function getLoggedUser(): ?User
    {
        if($this->checkUserIsLogged()) {
            return $_SESSION['user'];
        }
        return null;
    }
    public function logout(): void
    {
        unset($_SESSION['user']);
    }
}
