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

  public static function addComment(int $user_id, int $film_id, string $comment): bool {
    $pdo = Conect::pdo();  
    $stmt = $pdo->prepare( "
      INSERT INTO comments (user_id, film_id, comment, created_at) 
      VALUES (:user_id, :film_id, :comment, NOW())
    ");
    return $stmt->execute([
      ':user_id'=> $user_id,
      ':film_id'=> $film_id,
      ':comment'=> $comment,
      ':offset'=> $offset 
    ]);
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
  }

  public static function deleteCommentByFilmId(int $id): bool {
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


