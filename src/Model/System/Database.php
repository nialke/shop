<?php


namespace src\Model\System;


class Database
{
    /**
     * @var \PDO
     */
    private $db = null;
    private $statement = null;

    private $host = 'localhost';
    private $dbName = 'shop';
    private $userName = 'root';
    private $userPassword = '';

    public function __construct()
    {
        $this->DBconnection();
    }

    public function execute(string $query, array $parameters = null)
    {
        $this->statement = $this->db->prepare($query);
        $this->parameterBinder($parameters);
        $this->statement->execute();
        return $this->statement->fetchAll(\PDO::FETCH_ASSOC);
    }

    private function DBConnection()
    {
        try
        {
            $this->db = new \PDO('mysql:host='.$this->host.';dbname='.$this->dbName, $this->userName, $this->userPassword);
        }
        catch (PDOException $e)
        {
            print "Błąd połączenia z bazą!: " . $e->getMessage() . "<br/>";
            die();
        }
    }

    private function parameterBinder($parameter): void
    {
        if($parameter == null) {
            return;
        }
        foreach ($parameter as $parameterName => $parameterValue) {
            switch (gettype($parameterValue))
            {
                case 'double':
                case 'integer':
                    $this->statement->bindValue(':'.$parameterName, $parameterValue, \PDO::PARAM_INT);
                    break;
                default:
                    $this->statement->bindValue(':'.$parameterName, $parameterValue, \PDO::PARAM_STR);
                    break;
            }
        }
    }

}