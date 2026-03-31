<?php
namespace Repository;
use Core\Conect;
use PDO;
class PersonRepository{

  public static function getAll(): array {

    $pdo = Conect::pdo();
    $stmt = $pdo->prepare("SELECT * FROM peoples");
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);

  }

  public static function add(string $enName, string $ruName): int {
    $pdo = Conect::pdo();
    $stmt = $pdo->prepare("
      INSERT INTO genres (en_name, ru_name)
      VALUES (:enName, :ruName)
    ");
    $stmt->execute([
      ':enName' => $enName,
      ':ruName' => $ruName
    ]);
    return $pdo->lastInsertId();
  }

  public static function edit(
    int $id, 
    string $name, 
    string $namelast, 
    string $born,
    bool $gender,
    string $src, 
    string $wiki 
  ) : string {
    $pdo = Conect::pdo();
    $stmt = $pdo->prepare("
      UPDATE peoples
      SET 
      name = :name, 
      namelast = :namelast, 
      born_date = :born,
      gender = :gender, 
      photo_src = :src, 
      wiki_src = :wiki

      WHERE id = :id
    ");
    $stmt->execute([
      ':name' => $name,
      ':namelast' => $namelast,
      ':born' => $born,
      ':gender' => $gender,
      ':src' => $src,
      ':wiki' => $wiki,
      'id' => $id,
    ]);
  }

  public static function destreoy(int $id): string {
    $pdo = Conect::pdo();
    $stmt = $pdo->prepare("
      DELETE FROM peoples
      WHERE id = :id
    ");
    $stmt->execute([
      ':id' => $id
    ]);
  }
}


?>