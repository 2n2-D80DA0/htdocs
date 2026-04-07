<?php
// ██╗   ██╗███╗   ██╗███████╗██╗███╗   ██╗██╗███████╗██╗  ██╗███████╗██████╗ 
// ██║   ██║████╗  ██║██╔════╝██║████╗  ██║██║██╔════╝██║  ██║██╔════╝██╔══██╗
// ██║   ██║██╔██╗ ██║█████╗  ██║██╔██╗ ██║██║███████╗███████║█████╗  ██║  ██║
// ██║   ██║██║╚██╗██║██╔══╝  ██║██║╚██╗██║██║╚════██║██╔══██║██╔══╝  ██║  ██║
// ╚██████╔╝██║ ╚████║██║     ██║██║ ╚████║██║███████║██║  ██║███████╗██████╔╝
//  ╚═════╝ ╚═╝  ╚═══╝╚═╝     ╚═╝╚═╝  ╚═══╝╚═╝╚══════╝╚═╝  ╚═╝╚══════╝╚═════╝ 
                                                                           
namespace Repository;
use Core\Conect;
use PDO;
class FilmsRepository{

	public function __construct() {
		$this->db = Conect::getInstance()->getConnection();
	}

	public static function addFilm($film) {
		$pdo = Conect::pdo();
		$stmt = $pdo->prepare("
			INSERT INTO films (name, film_release, lor)
			VALUES (:name, :release, :lor);
		");
		$stmt->execute([
			':name' => $film["film_name"],
			':release' => $film["release_date"], 
			':lor' => $film["lor"]
		]); 
		// $raw = file_get_contents('php://input');
		$stmt->fetchAll();                                                                                                                                                                                                
		return($pdo->lastInsertId());
	}

	public static function getAll() : array {
		$pdo = Conect::pdo();
		$stmt = $pdo->prepare("SELECT * FROM films");
		$stmt->execute();
		$film = $stmt->fetchAll();                                                                                                                                                                                                  
		return($film);
	}


	public static function getFilm(int $id) {
		$pdo = Conect::pdo();
		$stmt = $pdo->prepare("SELECT * FROM films WHERE id = :id");
		$stmt->execute([
			':id' => $id
		]);
		$film = $stmt->fetch(PDO::FETCH_ASSOC);
		return $film;
	}

	public static function destroy(string $filmId) : string {
		$pdo = Conect::pdo();
		$stmt = $pdo->prepare("DELETE FROM films WHERE id = :id");
		$stmt->execute([
			':id' => $filmId
		]);
		$stmt->fetch();
		return "ok";
	}
// SELECT * FROM films LIMIT 20 OFFSET 0;
// INSERT INTO `films` (`id`, `name`, `rating`, `film_release`, `in_stock`, `lor`, `sum_rating`, `rating_count`) VALUES (NULL, 'кино', '0', '', '1', 'TEST', '0', '0');
}
?>