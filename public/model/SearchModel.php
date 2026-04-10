<?php
namespace User\Model;
use Core\Request;
use Core\Conect;
use PDO;

class SearchModel{

  public static function search (string $strQuest, int $offet = 0,int $limit = 6){
    // return 123;
    $pdo = Conect::pdo();
    $stmt = $pdo->prepare("
      SELECT *
      FROM films 
      WHERE name LIKE :h
      LIMIT :limit OFFSET :offset
    ");
    $stmt->execute([
      ":h" => "%".$strQuest."%",
      ":limit" => $limit,
      ":offset"=> $offet * $limit
      ]);
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
  }
  
}


?>