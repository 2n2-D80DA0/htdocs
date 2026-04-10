<?php
namespace User\Model;
use Core\Response;
use Core\Conect;
use PDO;


class CommentsModel {
  
  public static function getCommentsByFilm(int $film_id, int $limit = 10, int $offset = 0): array {
    $pdo = Conect::pdo();  
    $stmt = $pdo->prepare("
      SELECT id,user_id,comment,created_at
      FROM comments 
      WHERE film_id = :film_id 
      ORDER BY created_at DESC 
      LIMIT :limit 
      OFFSET :offset"
    );
    $stmt->execute([
      ':film_id'=> $film_id,
      ':limit'=> $limit,
      ':offset'=> $offset 
    ]);
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
  }

  public static function getCommentsByUser(int $user_id, int $limit = 10, int $offset = 0): array {
    $pdo = Conect::pdo();
    $stmt = $pdo->prepare("
      SELECT * 
      FROM comments 
      WHERE user_id = :user_id 
      ORDER BY created_at DESC 
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

  public static function getCommentsByUserAndFilm(int $user_id, int $film_id, int $limit = 10, int $offset = 0): array {
    $pdo = Conect::pdo();  
    $stmt = $pdo->prepare("
      SELECT * 
      FROM comments 
      WHERE user_id = :user_id 
      AND film_id = :film_id 
      ORDER BY created_at DESC 
      LIMIT :limit 
      OFFSET :offset");
    $stmt->execute([
      ':user_id'=> $user_id,
      ':film_id'=> $film_id,
      ':limit'=> $limit,
      ':offset'=> $offset 
    ]);
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
  } 

  public static function addComment(int $user_id, int $film_id, string $comment): array {

    $pdo = Conect::pdo();  
    $pdo->beginTransaction();
    try {

      $stmt = $pdo->prepare("
        INSERT INTO comments (user_id , film_id , comment) 
        VALUES (:user_id, :film_id, :comment);
      ");

      $stmt->execute([
        ':user_id'=> $user_id, 
        ':film_id'=> $film_id,
        ':comment'=> $comment
      ]);

      $stmt = $pdo->prepare("
        UPDATE films 
        SET comments = comments + 1
        WHERE id = :film_id"
      );
      $stmt->execute([
        ':film_id'=> $film_id
      ]);

      $pdo->commit();
      return Response::array('success','комментарий добавлен',0);
    } catch (\Exception $e) {
      $pdo->rollBack();
      return Response::array('error','проблема с дб',5);
    }
  }

  public static function deleteComment(int $id): bool {
    $pdo = Conect::pdo();
    $stmt = $pdo->prepare("
      DELETE FROM comments 
      WHERE id = :id
    ");
    return $stmt->execute([
      ':id'=> $id
    ]);









    // $pdo = Conect::pdo();  
    // $pdo->beginTransaction();
    // try {
    //   $stmt = $pdo->prepare("
    //     INSERT INTO comments (user_id , film_id , comment) 
    //     VALUES (:user_id, :film_id, :comment)
    //   ");
    //   echo 123;
    //   $stmt->execute([
    //     ':user_id'=> $user_id, 
    //     ':film_id'=> $film_id,
    //     ':comment'=> $comment
    //   ]);
    //   echo 123;

    //   $stmt = $pdo->prepare("
    //     UPDATE films 
    //     SET comments = comments + 1
    //     WHERE id = :film_id"
    //   );
    //   $stmt->execute([
    //     ':film_id'=> $film_id
    //   ]);

    //   $pdo->commit();
    //   return true;
    // } catch (\Exception $e) {
    //   $pdo->rollBack();
    //   return false;
    // }
  }

  public static function deleteCommentByFilmId(int $id): bool {
    // будет getCommentsByUser
    // потом удаление по форич
    $pdo = Conect::pdo();  
    $stmt = $pdo->prepare("
      DELETE FROM comments 
      WHERE movie_id = :id
    ");
    return $stmt->execute([
      ':id'=> $id
    ]);
  }

  public static function deleteCommentByUserId(int $id): bool {
    $pdo = Conect::pdo();
    $stmt = $pdo->prepare("
      DELETE FROM comments 
      WHERE user_id = :id
    ");
    return $stmt->execute([
      ':id'=> $id
    ]);
  }

}


