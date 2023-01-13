<?php
class ConnectionBDD
{
    //Declaration of private variables
    private $O_pdo;

    public function __construct()
    {
        try {
            $S_dsn = 'mysql:S_host=' . 'mysql-eclair-d-eugenie.alwaysdata.net' . ';S_dbName=' . 'eclair-d-eugenie_db';
            $this->O_pdo = new PDO($S_dsn, '295283', 'eugenax18'); //Link with the database
        }
        catch (PDOException $e) {
            return $e->getMessage();
        }
    }
}