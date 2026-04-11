<?php
namespace User\Model;
use Repository\FilmPersonsRepository;
use PDO;
use Core\Conect;

class ParticipantsModel {
  public static function getActors (int $film_id)  {
    return FilmPersonsRepository::getActors($film_id);
}
  public static function getProducer (int $film_id)  {
    return FilmPersonsRepository::getProducer($film_id);
  }
  public static function getDirectors (int $film_id)  {
    return FilmPersonsRepository::getDirectors($film_id);
  }
}
?>
