<?php

namespace Admin\Controller;
use Model;
use VieW;
use libs;

class FilmsController{

	public static function index (Request $request) : void {
		$films = filmModel::getAll();
		http_response_code(200);
		require __DIR__ . '/../views/films.php';
	} 

	public static function make () : void {
		http_response_code(200);
		require __DIR__ . '/../views/filmMake.php';
	} 

	public static function edit (Request $request) : void {
		http_response_code(200);
		$film = filmModel::getFilm($request->$id);
		require __DIR__ . '/../views/filmEdit.php';
	}

	public static function updateFilm (Request $request) : void {
		$result = FilmModel::edit($request->input("id"), $request->body());
		header('Content-Type: application/json');
		http_response_code(($result['status'] === 'error') ? (400) : (200));
		echo json_encode($result);
	} 

	public static function addFilm (Request $request) : void {
		$result = FilmModel::add($request->body());
		header('Content-Type: application/json');
		http_response_code(($result['status'] === 'error') ? (400) : (200));
		echo json_encode($result);
	}

	public static function destreoy (Request $request) : void {
		$result = FilmModel::destreoy($request->params());
		header('Content-Type: application/json');
		http_response_code(($result['status'] === 'error') ? (400) : (200));
		echo json_encode($result);
	}
}
?>