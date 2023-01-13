<?php
class ConnexionBDD
{
    //Declaration of private variables
    private $O_pdo;

    public function __construct($S_nomUtilisateur, $S_motDePasse)
    {
        try {
            $S_dsn = 'mysql:S_host=mysql-eclair-d-eugenie.alwaysdata.net;S_dbName=eclair-d-eugenie_db';
            $this->O_pdo = new PDO($S_dsn, $S_nomUtilisateur, $S_motDePasse); //Link with the database
        }
        catch (PDOException $e) {
            return $e->getMessage();
        }
    }

    public static function donnerPdo() {
        return self::$O_pdo;
    }
}