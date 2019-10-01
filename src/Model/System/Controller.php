<?php

namespace src\Model\System;

use src\Model\UserSession\UserSession;
use src\Model\Entities\User;

abstract class Controller
{
    protected function getLoggedUser(): ?User
    {
        $userSession = new UserSession();
        return $userSession->getLoggedUser();
    }
}
