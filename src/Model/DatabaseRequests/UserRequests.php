<?php


namespace src\Model\DatabaseRequests;

use src\Model\Entities\User;
use src\Model\System\Database;

class UserRequests
{
    public function setUserToDB(User $user)
    {
        $db = new Database();

        $query = "INSERT INTO `user`(`nick`, `password`, `create_date`) VALUES (:nick, :password, :create_date);";

        $parameters = [
            "nick" => $user->getNick(),
            "password" => $user->getPassword(),
            "create_date" => $user->getCreateDate()->format("Y-m-d H:i:s"),
        ];

        return $db->execute($query, $parameters);
    }

    public function userExist(User $user): bool
    {
        $db = new Database();

        $query = "SELECT * FROM `user` WHERE `nick` = :nick;";
        $parameter = [
            "nick" => $user->getNick()
        ];

        return count($db->execute($query, $parameter)) > 0;
    }

    public function correctLoginAndPassword(User $user): bool
    {
        $db = new Database();
        $query = 'SELECT * FROM `user` WHERE `nick` = :nick AND `password` = :password;';
        $parameters = [
            "nick" => $user->getNick(),
            "password" => $user->getPassword()
        ];

        return count($db->execute($query, $parameters)) > 0;
    }

    public function getUserDataFromDB(User $user)
    {
        $db = new Database();
        $query = "SELECT * FROM `user` WHERE `nick` = :nick;";
        $parameter = [
          "nick" => $user->getNick(),
        ];
        return $db->execute($query, $parameter);
    }
}