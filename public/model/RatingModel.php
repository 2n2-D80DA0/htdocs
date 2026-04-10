<?php
namespace User\Model;
use Core\Response;
use Core\Conect;
use PDO;

class RatingModel {

  public static function getRatingsByMovie(int $movie_id, int $limit = 10, int $offset = 0): array {
    $pdo = Conect::pdo();
    $stmt = $pdo->prepare(
      "SELECT * 
      FROM ratings 
      WHERE movie_id = :movie_id 
      ORDER BY id DESC 
      LIMIT :limit OFFSET :offset");
    $stmt->execute([
      ':movie_id'=> $movie_id, 
      ':limit'=> $limit,
      ':offset'=> $offset
    ]);
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
  }

  public static function getRatingsByUser(int $user_id, int $limit = 10, int $offset = 0): array {
    $pdo = Conect::pdo();
    $stmt = $pdo->prepare("
      SELECT * 
      FROM ratings 
      WHERE user_id = :user_id 
      ORDER BY id DESC 
      LIMIT :limit 
      OFFSET :offset"
    );
    $stmt->execute([
      ':user_id'=> $user_id,
      ':limit'=> $limit,
      ':offset'=> $offset
    ]);
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
  }

  public static function getRatingByUserAndMovie(int $user_id, int $movie_id): ?array {
    $pdo = Conect::pdo();
    $stmt = $pdo->prepare("
      SELECT * 
      FROM ratings 
      WHERE user_id = :user_id 
      AND movie_id = :movie_id 
      LIMIT 1
    ");
    $stmt->execute([
      ':user_id'=> $user_id, 
      ':movie_id'=> $movie_id
    ]);
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    return $result ?: null;
  }

  public static function setRating(int $user_id, int $movie_id, int $rating): array {
    if($rating>5 || $rating<1) return Response::array('error','ты че сума сошел ',5);

    $pdo = Conect::pdo();
    $pdo->beginTransaction();
    try {
      $old = self::getRatingByUserAndMovie($user_id, $movie_id);
      
      if ($old) {
        $stmt = $pdo->prepare("DELETE FROM ratings WHERE id = :id");
        $stmt->execute([":id" => $old['id']]);
        $stmt = $pdo->prepare("
          UPDATE films
          SET 
          sum_rating = sum_rating - :old_rating1,
          rating_count = rating_count - 1,
          rating = sum_rating/rating_count
        ");
          
        $stmt->execute([
          ':old_rating1' => $old['rating'],
          ':movie_id'=> $movie_id
        ]);
      }
      
      $stmt = $pdo->prepare("
        INSERT INTO ratings (user_id, movie_id, rating) 
        VALUES (:user_id, :movie_id, :rating)
      ");
      $stmt->execute([
        ':user_id'=> $user_id, 
        ':movie_id'=> $movie_id,
        ':rating'=> $rating
      ]);

      // обновляем рейтинг фильма

      $stmt = $pdo->prepare("
        UPDATE films 
        SET 
          sum_rating = sum_rating + :rating, 
          rating_count = rating_count + 1, 
          rating = sum_rating / rating_count
        WHERE id = :movie_id"
      );
      $stmt->execute([
        ':rating'=> $rating, 
        ':movie_id'=> $movie_id
      ]);

      $pdo->commit();
      return Response::array('success','рейтинг добавлен',0);
    } catch (\Exception $e) {
      $pdo->rollBack();
      return Response::array('error','ошибка db',6);
    }
  }

  public static function deleteRating( int $user_id, int $movie_id): bool {
    $pdo = Conect::pdo();
    $pdo->beginTransaction();
    try {
      $old = self::getRatingByUserAndMovie($pdo, $user_id, $movie_id);
      if (!$old) return false;


      $stmt = $pdo->prepare("DELETE FROM ratings WHERE id = :id");
      $stmt->execute([':id'=> $old['id']]);

      $stmt = $pdo->prepare("
        UPDATE films 
        SET 
          sum_rating = sum_rating - :old_rating, 
          rating_count = rating_count - 1, 
          rating = CASE WHEN rating_count - 1 = 0 THEN 0 ELSE (sum_rating - :old_rating)/(rating_count - 1) END
        WHERE id = :movie_id
      ");
      $stmt->execute([
        ':old_rating'=> $old['rating'],
        ':movie_id'=> $movie_id
      ]);

      $pdo->commit();
      return true;
    } catch (\Exception $e) {
      $pdo->rollBack();
      // не использую thrwo тут вопрос есть 
      return false;
    }
  }

}
