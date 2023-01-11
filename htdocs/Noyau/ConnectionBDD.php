<?php
class ConnectionBDD
{
    //Declaration of private variables
    private $O_pdo;

    public function __construct($S_host, $S_dbName, $S_userName, $S_password)
    {
        try {
            $S_dsn = 'mysql:S_host=' . $S_host . ';S_dbName=' . $S_dbName;
            $this->O_pdo = new PDO($S_dsn, $S_userName, $S_password); //Link with the database
        }
        catch (PDOException $e) {
            return $e->getMessage();
        }
    }
}