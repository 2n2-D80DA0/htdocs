<?php
namespace Repository;
use Core\Conect;
use PDO;

class FilmPropertyRepository{

  public static function tugArr ($film_id,$propName_Id,$array) {
    foreach($array as $prop_id)
      self::tug($film_id,$propName_Id,$prop_id);
  }
  
  public static function untugFromFilmId ($id) {
    $pdo = Conect::pdo();
    $stmt = $pdo->prepare("DELETE FROM film_properties WHERE `film_id` = :id and `propertie_id` = 5");
    $stmt->execute([
      ":id" => $id
    ]);
    $stmt->fetchAll();
  }

  public static function untugFromGenreId ($id) {
    $pdo = Conect::pdo();
    $stmt = $pdo->prepare("DELETE FROM film_properties WHERE propertie_id = :id and property_type_id = 5");
    $stmt->execute([
      ":id" => $id
    ]);
    $stmt->fetchAll();
  }

  public static function tug ($film_id,$propName_Id,$prop_id)  {
    $pdo = Conect::pdo();
    $stmt = $pdo->prepare("
      INSERT INTO film_properties (propertie_id,	film_id, property_type_id)
      VALUES (:propName_Id, :film_id, :prop_id)
    ");
    $stmt->execute([
      ':prop_id' => $prop_id,
      ':film_id' => $film_id,
      ':propName_Id' => $propName_Id
    ]);
    $stmt->fetchAll();
  }

  public static function untug ($id)  {
    $pdo = Conect::pdo();
    $stmt = $pdo->prepare("DELETE FROM film_properties WHERE id = :id");
    $stmt->execute([
      ":id" => $id
    ]);
    $stmt->fetchAll();
  }

  public static function getAllGenresFromFilm ($film_id,$propName_Id,$prop_id)  {
    
  }

  public static function getAllFilmsFromGenres ($film_id,$propName_Id,$prop_id)  {

  }

  public static function delateAllGenresFromFilm ($film_id,$propName_Id,$prop_id)  {
  
  }

}


?>