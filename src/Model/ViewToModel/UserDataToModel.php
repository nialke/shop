<?php


namespace src\Model\ViewToModel;

use src\Model\Entities\User;

class UserDataToModel
{
    public function userDataMapper(array $userData): User
    {
        $user = new User();
        $user->setNick($userData['nick']);
        $user->setPassword($userData['password']);
        return $user;
    }

    public function userAllDataMapper (array $userData, User $user): User
    {
        $userData = $userData[0];
        $createDate = date_create_from_format('Y-m-d H:i:s', $userData['create_date']);

        $user->setCreateDate($createDate);
        $user->setId($userData['id']);
        $user->setType($userData['type']);

        return $user;
    }

}
