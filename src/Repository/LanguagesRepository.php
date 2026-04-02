<?php
namespace Repository;
use Core\Conect;
use PDO;

class LanguagesRepository {

  public static function getAll(): array {
    $pdo = Conect::pdo();
    $stmt = $pdo->prepare("SELECT * FROM languages");
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
  }

  public static function add(string $enName, string $ruName): void {
    $pdo = Conect::pdo();
    $stmt = $pdo->prepare("
      INSERT INTO languages (en_name, ru_name)
      VALUES (:enName, :ruName)
    ");
    $stmt->execute([
      ':enName' => $enName,
      ':ruName' => $ruName
    ]);
  }

  public static function edit(int $id, string $enName, string $ruName): void {

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
  }

  public static function destreoy(int $id): void {
    $pdo = Conect::pdo();
    $stmt = $pdo->prepare("
      DELETE FROM languages
      WHERE id = :id
    ");
    $stmt->execute([
      ':id' => $id
    ]);
  }
}


?>