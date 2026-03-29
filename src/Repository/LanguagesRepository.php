<?php
namespace Repository;
use PDO;
use Core\Conect;


class LanguagesRepository{
  public static function getAll () : array {
    $pdo = Conect::pdo();
		$stmt = $pdo->prepare("SELECT * FROM languages");
		$stmt->execute();
		$languages = $stmt->fetchAll(PDO::FETCH_ASSOC);                                                                                                                                                                                                  
		return($languages);
	} 

  public static function add (string $enName,string $ruName) : void {
    $pdo = Conect::pdo();
		$stmt = $pdo->prepare("INSERT INTO languages (en_name, ru_name) VALUES (:enName, :ruName)");
		$stmt->execute([
			':enName' => $enName,
      ':ruName' =>  $ruName
		]);
		$stmt->fetch();
	} 

  public static function edit (int $id,string $enName,string $ruName) : void {
    $pdo = Conect::pdo();
		$stmt = $pdo->prepare("
      UPDATE languages
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
      DELATE FROM languages
      WHERE id = :id;
    ");
		$stmt->execute([
      ':id' => $id
		]);
		$stmt->fetch();
	}
}


?>