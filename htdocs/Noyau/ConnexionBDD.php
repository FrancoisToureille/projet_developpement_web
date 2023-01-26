<?php
class ConnexionBDD
{
    /**
   * Instance de la classe PDO
   *
   * @var PDO
   * @access private
   */ 
  private $PDOInstance = null;
 
   /**
   * Instance de la classe ConnexionBDD
   *
   * @var self
   * @access private
   * @static
   */ 
  private static $instance = null;
 
  /**
   * Constante: nom d'utilisateur de la bdd
   *
   * @var string
   */
  const DEFAULT_SQL_USER = '295283';
 
  /**
   * Constante: hôte de la bdd
   *
   * @var string
   */
  const DEFAULT_SQL_HOST = 'mysql-eclair-d-eugenie.alwaysdata.net';
 
  /**
   * Constante: hôte de la bdd
   *
   * @var string
   */
  const DEFAULT_SQL_PASS = 'eugenax18';
 
  /**
   * Constante: nom de la bdd
   *
   * @var string
   */
  const DEFAULT_SQL_DTB = 'eclair-d-eugenie_db';
 
  /**
   * Constructeur
   *
   * @param void
   * @return void
   * @see PDO::__construct()
   * @access private
   */
  private function __construct()
  {
    $this->PDOInstance = new PDO('mysql:dbname='.self::DEFAULT_SQL_DTB.';host='.self::DEFAULT_SQL_HOST,self::DEFAULT_SQL_USER ,self::DEFAULT_SQL_PASS);    
  }
 
   /**
    * Crée et retourne l'objet ConnexionBDD
    *
    * @access public
    * @static
    * @param void
    * @return ConnexionBDD $instance
    */

  /** singleton créé pour avoir une connexion à la base de données */
  public static function getInstance()
  {  
    if(is_null(self::$instance))
    {
      self::$instance = new ConnexionBDD();
    }
    return self::$instance;
  }
 
  public function getPdo(): PDO
  {
    return $this->PDOInstance;
  }
  /**
   * 
   * Exécute une requête SQL avec PDO
   *
   * @param string $query La requête SQL
   * @return PDOStatement Retourne l'objet PDOStatement
   */
  public function query($query)
  {
    return $this->PDOInstance->query($query);
  }
}