<?php
namespace Repository;
use PDO;
use Core\Conect;

class FilmPersonsRepository{
  protected static int $ACTOR_ID = 2;
  protected static int $DIRECTOR_ID = 3;
  protected static int $PRODUCER_ID = 4;
  public static function tugArr ($film_id,$job_Id,$array) {
    foreach($array as $person_id)
      self::tug($film_id,$job_Id,$person_id);
  }

  public static function tug ($film_id,$job_Id,$person_id)  {
    $pdo = Conect::pdo();
    $stmt = $pdo->prepare("
      INSERT INTO participants (people_id,	film_id, job_id)
      VALUES (:people_id, :film_id, :job_id)
    ");
    $stmt->execute([
      ':job_id' => $job_Id,
      ':film_id' => $film_id,
      ':people_id' => $person_id
    ]);
    $stmt->fetchAll();
  }

  public static function getPerson ($film_id,$job_id)  {
    $pdo = Conect::pdo();
    // $stmt = $pdo->prepare("
    //   SELECT *
    //   FROM participants
    //   WHERE film_id = :film_id 
    //   and job_id = :job_id
    // ");
    $stmt = $pdo->prepare("
      SELECT p.*
      FROM participants as c
      JOIN peoples as p
      on c.people_id = p.id
      WHERE c.film_id = :film_id 
      and c.job_id = :job_id
    ");
    // $stmt = $pdo->prepare("
    //   SELECT p.*
    //   FROM peoples as p
    //   JOIN participants as c
    //   on p.id = c.people_id
    // ");
    $stmt->execute([
      ':job_id' => $job_id,
      ':film_id' => $film_id
    ]);
    $array = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $array;
  }

  public static function getActors ($film_id)  {
    return self::getPerson($film_id,2);
  }
  public static function getProducer ($film_id)  {
    return self::getPerson($film_id,4);
  }
  public static function getDirectors ($film_id)  {
    return self::getPerson($film_id,3);
  }
  

}


?>