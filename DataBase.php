<?php
class DataBase
{
    //Declaration of private variables
    private $pdo;

    public function __construct($host, $dbName, $userName, $password)
    {
        try {
            $dsn = 'mysql:host=' . $host . ';dbname=' . $dbName;
            $this->pdo = new PDO($dsn, $userName, $password); //Link with the database
        }
        catch (PDOException $e) {
            return $e->getMessage();
        }
    }

    /**
     * Prepare and execute the query
     * @param $query
     * @return false|PDOStatement|string
     */
    public function executeQuery($query)
    {
        try {
            $statement = $this->pdo->prepare($query);
            $statement->execute();
            $statement->setFetchMode(PDO::FETCH_OBJ);
            return $statement;
        }
        catch (PDOException $e) {
            return $e->getMessage();
        }
    }
}

