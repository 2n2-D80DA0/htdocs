<?php
namespace Repository;
use Core\Conect;
use Core\Storage;
use PDO;

class PersonRepository{

  public static function getAll(): array {

    $pdo = Conect::pdo();
    $stmt = $pdo->prepare("SELECT * FROM peoples");
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);

  }

  public static function add(string $name, string $namelastm, string $born, bool $gender, string $wiki): int {
    $pdo = Conect::pdo();
    $stmt = $pdo->prepare("
      INSERT INTO peoples (name, namelast,born_date,gender,wiki_src)
      VALUES (
        :name,
        :namelastm,
        :born,
        :gender,
        :wiki)
    ");

    $stmt->execute([
    ':name'=>$name,
    ':namelastm'=>$namelastm,
    ':born'=>$born,
    ':gender'=>$gender,
    ':wiki'=>$wiki
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