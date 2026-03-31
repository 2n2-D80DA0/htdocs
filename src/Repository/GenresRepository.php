<?php
namespace Repository;
use PDO;
use Core\Conect;

// ██╗   ██╗███╗   ██╗███████╗██╗███╗   ██╗██╗███████╗██╗  ██╗███████╗██████╗ 
// ██║   ██║████╗  ██║██╔════╝██║████╗  ██║██║██╔════╝██║  ██║██╔════╝██╔══██╗
// ██║   ██║██╔██╗ ██║█████╗  ██║██╔██╗ ██║██║███████╗███████║█████╗  ██║  ██║
// ██║   ██║██║╚██╗██║██╔══╝  ██║██║╚██╗██║██║╚════██║██╔══██║██╔══╝  ██║  ██║
// ╚██████╔╝██║ ╚████║██║     ██║██║ ╚████║██║███████║██║  ██║███████╗██████╔╝
//  ╚═════╝ ╚═╝  ╚═══╝╚═╝     ╚═╝╚═╝  ╚═══╝╚═╝╚══════╝╚═╝  ╚═╝╚══════╝╚═════╝ 
                                                                           
// можно вынести название таблицы
class GenresRepository {

  public static function getAll(): array {
    try {
      $pdo = Conect::pdo();
      $stmt = $pdo->prepare("SELECT * FROM genres");
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
        INSERT INTO genres (en_name, ru_name)
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
        UPDATE genres
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
        DELETE FROM genres
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