<?php

namespace User\Model;
use PDO;
use Core\Conect;

class GenreModel{
  public static function getAllOnFilm(int $id) {
		$pdo = Conect::pdo();
		$stmt = $pdo->prepare("
			SELECT fp.property_type_id as id, g.ru_name as name
			FROM film_properties as fp
			JOIN genres as g ON g.id = fp.property_type_id 
			WHERE fp.film_id = :id
			and propertie_id = 5
		");
		$stmt->execute([
			':id' => $id
		]);
		$film = $stmt->fetchAll(PDO::FETCH_ASSOC);
		return $film;
	}


}
?>

