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

  public static function getAll(): array|null {
    $pdo = Conect::pdo();
    $stmt = $pdo->prepare("SELECT * FROM genres");
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
  }

  public static function add(string $enName, string $ruName): void {

    $pdo = Conect::pdo();
    $stmt = $pdo->prepare("
      INSERT INTO genres (en_name, ru_name)
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
      UPDATE genres
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
      DELETE FROM genres
      WHERE id = :id
    ");
    $stmt->execute([
      ':id' => $id
    ]);
  }
}

?>