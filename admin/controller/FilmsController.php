<?php
// ███████╗██╗███╗   ██╗██╗███████╗██╗  ██╗
// ██╔════╝██║████╗  ██║██║██╔════╝██║  ██║
// █████╗  ██║██╔██╗ ██║██║███████╗███████║
// ██╔══╝  ██║██║╚██╗██║██║╚════██║██╔══██║
// ██║     ██║██║ ╚████║██║███████║██║  ██║
// ╚═╝     ╚═╝╚═╝  ╚═══╝╚═╝╚══════╝╚═╝  ╚═╝

namespace Admin\Controller;
use Model;
use VieW;
use libs;

class FilmsController{

	public static function index (Request $request) : void {
		$films = filmModel::getAll();
		http_response_code(200);
		require __DIR__ . '/../view/films.php';
	} 

	public static function make () : void {
		http_response_code(200);
		require __DIR__ . '/../view/filmMake.php';
	} 

	public static function edit (Request $request) : void {
		http_response_code(200);
		$film = filmModel::getFilm($request->$id);
		require __DIR__ . '/../view/filmEdit.php';
	}

	public static function updateFilm (Request $request) : void {
		$result = FilmModel::edit($request->input("id"), $request->body());
		Response::jsonResponse($result);
	} 

	public static function addFilm (Request $request) : void {
		$result = FilmModel::add($request->body());
		Response::jsonResponse($result);
	}

	public static function destreoy (Request $request) : void {
		$result = FilmModel::destreoy($request->params());
		Response::jsonResponse($result);
	}
}
?>