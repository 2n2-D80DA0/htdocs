<?php
// ███████╗██╗███╗   ██╗██╗███████╗██╗  ██╗
// ██╔════╝██║████╗  ██║██║██╔════╝██║  ██║
// █████╗  ██║██╔██╗ ██║██║███████╗███████║
// ██╔══╝  ██║██║╚██╗██║██║╚════██║██╔══██║
// ██║     ██║██║ ╚████║██║███████║██║  ██║
// ╚═╝     ╚═╝╚═╝  ╚═══╝╚═╝╚══════╝╚═╝  ╚═╝

namespace Admin\Controller;
use Admin\Model\FilmsModel;
use Admin\Model\LanguageModel;
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
		Response::jsonResponse($result);
	}

	public static function anonsFilm (Request $request) : void {
		$result = FilmsModel::add($request->body());
		Response::jsonResponse($result);
	}

	public static function destreoy (Request $request) : void {
		$result = FilmsModel::destreoy($request->params());
		Response::jsonResponse($result);
	}
}
?>