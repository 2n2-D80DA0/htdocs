<?php
namespace Core;

use PDO;
use PDOException;

class Conect
{
    private static ?Conect $instance = null;
    private PDO $pdo;

    private string $host = 'localhost';
    private string $db   = 'movie_hunter';
    private string $name = 'root';
    private string $pass = '';
    private string $charset = 'utf8mb4';

    private function __construct()
    {
    $con = "mysql:host={$this->host};dbname={$this->db};charset={$this->charset}";
    try {
      $this->pdo = new PDO($con, $this->name, $this->pass, [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,      
        PDO::ATTR_EMULATE_PREPARES => false,                 
      ]);
    } catch(PDOException  $error) {
      die("DB Connection failed: " . $error->getMessage());
    }
  }
  private function __clone() {}
  public function __wakeup() {}

  public static function getInstance(): Conect
  {
    if (self::$instance === null)
      self::$instance = new Conect();
    return self::$instance;
  }

  public function getConnection() : PDO{
    return $this->pdo;
  }
}

?>
