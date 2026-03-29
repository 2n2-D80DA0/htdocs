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
class GenresRepository{

  public static function getAll () : array {
    $pdo = Conect::pdo();
		$stmt = $pdo->prepare("SELECT * FROM genres");
		$stmt->execute();
		$Genres = $stmt->fetchAll(PDO::FETCH_ASSOC);                                                                                                                                                                                                  
		return($Genres);
	} 

  public static function add (string $enName,string $ruName) : void {
    $pdo = Conect::pdo();
		$stmt = $pdo->prepare("INSERT INTO genres (en_name, ru_name) VALUES (:enName, :ruName)");
		$stmt->execute([
			':enName' => $enName,
      ':ruName' =>  $ruName
		]);
		$stmt->fetch();
	} 

  public static function edit (int $id,string $enName,string $ruName) : void {
    $pdo = Conect::pdo();
		$stmt = $pdo->prepare("
      UPDATE genres
      SET ru_name = :enName, en_name = :ruName
      WHERE id = :id;
    ");
		$stmt->execute([
			':enName' => $enName,
      ':ruName' =>  $ruName,
      ':id' => $id
		]);
		$stmt->fetch();

	}
  
  public static function destreoy (int $id) : void {
    $pdo = Conect::pdo();
		$stmt = $pdo->prepare("
      DELATE FROM genres
      WHERE id = :id;
    ");
		$stmt->execute([
      ':id' => $id
		]);
		$stmt->fetch();
	}
}

?>