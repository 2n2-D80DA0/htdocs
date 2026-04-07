<?php
namespace User\Model;
use Core\Conect;
use Repository\FilmsRepository;
use PDO;


class FilmsModel {

  public static function getStackFromNow(int $offset = 0,int $limit = 6): array {
    $pdo = Conect::pdo();
    $stmt = $pdo->prepare("
      SELECT 
        id,
        name,
        rating,
        film_release,
        in_stock,
        lor,
        sum_rating,
        comments,
        rating_count
      FROM films
      ORDER BY film_release DESC
      LIMIT :limit OFFSET :offset
    ");
    $stmt->execute([
			':limit' => $limit,
			':offset' => $offset
		]); 
    $arr = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $arr;
  }
  public static function getStackFromComments(int $offset = 0,int $limit = 6): array {
    $pdo = Conect::pdo();
    $stmt = $pdo->prepare("
      SELECT 
        id,
        name,
        rating,
        film_release,
        in_stock,
        lor,
        sum_rating,
        comments,
        rating_count
      FROM films
      ORDER BY comments DESC
      LIMIT :limit OFFSET :offset
    ");
    $stmt->execute([
			':limit' => $limit,
			':offset' => $offset
		]); 
    $arr = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $arr;
  }
  public static function getStackFromRating(int $offset = 0,int $limit = 6): array {
    $pdo = Conect::pdo();
    $stmt = $pdo->prepare("
      SELECT 
        id,
        name,
        rating,
        film_release,
        in_stock,
        lor,
        sum_rating,
        comments,
        rating_count
      FROM films Where rating_count > 0
      ORDER BY rating DESC
      LIMIT :limit OFFSET :offset
    ");
    $stmt->execute([
			':limit' => $limit,
			':offset' => $offset
		]); 
    $arr = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $arr;
  }

  public static function getFilm(int $id): array {
    return FilmsRepository::getFilm($id);
  }


}