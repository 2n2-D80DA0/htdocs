<?php
namespace Repository;
use PDO;
use PDOException;
use Core\Conect;


class LanguagesRepository {

  public static function getAll(): array {
    try {
      $pdo = Conect::pdo();
      $stmt = $pdo->prepare("SELECT * FROM languages");
      $stmt->execute();
      return $stmt->fetchAll(PDO::FETCH_ASSOC);

    } catch (PDOException $e) {
      return $e->getMessage();
    }
  }

  public static function add(string $enName, string $ruName): string {
    try {
      $pdo = Conect::pdo();
      $stmt = $pdo->prepare("
        INSERT INTO languages (en_name, ru_name)
        VALUES (:enName, :ruName)
      ");
      $stmt->execute([
        ':enName' => $enName,
        ':ruName' => $ruName
      ]);
      return "ok";
    } catch (PDOException $e) {
      return $e->getMessage();
    }
  }

  public static function edit(int $id, string $enName, string $ruName): string {
    try {
      $pdo = Conect::pdo();
      $stmt = $pdo->prepare("
        UPDATE languages
        SET en_name = :enName, ru_name = :ruName
        WHERE id = :id
      ");
      $stmt->execute([
        ':enName' => $enName,
        ':ruName' => $ruName,
        ':id' => $id
      ]);
      return "ok";
    } catch (PDOException $e) {
      return $e->getMessage();
    }
  }

  public static function destreoy(int $id): string {
    try {
      $pdo = Conect::pdo();
      $stmt = $pdo->prepare("
        DELETE FROM languages
        WHERE id = :id
      ");
      $stmt->execute([
        ':id' => $id
      ]);
      return "ok";
    } catch (PDOException $e) {
      return $e->getMessage();
    }
  }
}


?>