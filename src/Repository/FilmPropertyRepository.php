<?php
namespace Repository;
use Core\Conect;
use PDO;

class FilmPropertyRepository{

  public static function tugArr ($film_id,$propName_Id,$array) {
    foreach($array as $prop_id)
      self::tug($film_id,$propName_Id,$prop_id);
    
  }
  
  public static function unTugArr ($film_id,$propName_Id,$array) {
    foreach($array as $prop_id)
      self::tug($film_id,$propName_Id,$prop_id);
    
  }


  public static function tug ($film_id,$propName_Id,$prop_id)  {
    $pdo = Conect::pdo();
    $stmt = $pdo->prepare("
      INSERT INTO film_properties (propertie_id,	film_id, property_type_id)
      VALUES (:film_id, :propName_Id, :prop_id))
    ");

    $stmt->execute([
      ':prop_id' => $prop_id,
      ':film_id' => $film_id,
      ':propName_Id' => $propName_Id
    ]);
  }

  public static function untug ($film_id,$propName_Id,$prop_id)  {

  }

  public static function getAllFrom ($film_id,$propName_Id,$prop_id)  {

  }

}


?>