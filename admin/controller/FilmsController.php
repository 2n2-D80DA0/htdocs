<?php
// ███████╗██╗███╗   ██╗██╗███████╗██╗  ██╗
// ██╔════╝██║████╗  ██║██║██╔════╝██║  ██║
// █████╗  ██║██╔██╗ ██║██║███████╗███████║
// ██╔══╝  ██║██║╚██╗██║██║╚════██║██╔══██║
// ██║     ██║██║ ╚████║██║███████║██║  ██║
// ╚═╝     ╚═╝╚═╝  ╚═══╝╚═╝╚══════╝╚═╝  ╚═╝

namespace Admin\Controller;
use Admin\Model\FilmsModel;
use Repository\FilmPropertyRepository;
use Admin\Model\LanguageModel;
use Admin\Model\PersonsModel;
use Repository\FilmPersonsRepository;
use Admin\Model\GenreModel;
use Core\Response;
use Core\Request;
use View;

class FilmsController{

	public static function index (Request $request) : void {
		$films = FilmsModel::getAll();
		http_response_code(200);
		require __DIR__ . '/../view/films.php';
	} 

	public static function make (Request $request) : void {
		http_response_code(200);
		$persons = PersonsModel::getAll();

		$genres = GenreModel::getAll();

		$languages = LanguageModel::getAll();

		require __DIR__ . '/../view/addFilm.php';
	} 

	public static function edit (Request $request) : void {
		http_response_code(200);
		$film = FilmsModel::getFilm($request->quest("id"));
		require __DIR__ . '/../view/filmEdit.php';
	}

	public static function updateFilm (Request $request) : void {
		$result = FilmsModel::edit($request->input("id"), $request->body());
		Response::jsonResponse($result);
	} 

	public static function addFilm (Request $request) : void {

		$result = FilmsModel::add($request->quest(),$_FILES['poster'],$_FILES['movie'],$_FILES['trailer']);
		$prop_ids = json_decode($request->quest("genres"),true);
		$a = json_decode($request->quest("directors"),true);
		$b = json_decode($request->quest("actors"),true);
		$c = json_decode($request->quest("producer"),true);
		FilmPropertyRepository::tugArr($result["data"],"5",$prop_ids);

		FilmPersonsRepository::tugArr($result["data"],"3",$a);
		FilmPersonsRepository::tugArr($result["data"],"2",$b);
		FilmPersonsRepository::tugArr($result["data"],"4",$c);

		Response::jsonResponse($result);
	}

	public static function anonsFilm (Request $request) : void {
		$result = FilmsModel::add($request->body());
		Response::jsonResponse($result);
	}

	public static function destreoy (Request $request) : void {
		$result = FilmsModel::delete($request->params("id"));
		Response::jsonResponse($result);
	}
}
?>