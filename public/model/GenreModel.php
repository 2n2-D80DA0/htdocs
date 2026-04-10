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
	public static function filmCountFromGenre ($id) {
		$pdo = Conect::pdo();

		$stmt = $pdo->prepare("
			SELECT count(*) as count
			FROM film_properties  
			WHERE propertie_id  = 5 and property_type_id = :a
		");
				// echo(123);
		$stmt->execute([
			':a' => $id
		]);
		$count = $stmt->fetchAll();
		return($count[0]["count"]);
	}
	public static function getStackFromGenre ($id) {
		$pdo = Conect::pdo();

		$stmt = $pdo->prepare("
			SELECT f.*
			FROM films as f
			JOIN film_properties as fp ON f.id = fp.film_id
			WHERE fp.propertie_id = 5 
			AND fp.property_type_id = :a
		");
		$stmt->execute([
			':a' => $id
		]);
		$films = $stmt->fetchAll(PDO::FETCH_ASSOC);
		return($films);
	}

}
?>

