<?php

namespace Admin\Controller;
use Model;
use VieW;
use libs;

class FilmController{

	public static function index (Request $request) : void {
		$films = filmModel::getAll();
		http_response_code(200);
		require __DIR__ . '/../views/filmIndex.php';
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
		$result = FilmModel::updateFilm($request->input("id"), $request->body());

		header('Content-Type: application/json');
		if ($result['status'] === 'error') {
			http_response_code(400);
			echo json_encode($result);
		} else {
			http_response_code(200);
			echo json_encode($result);
		}
	} 

	public static function addFilm (Request $request) : void {
		$result = FilmModel::addFilm($request->body());

		header('Content-Type: application/json');
		if ($result['status'] === 'error') {
			http_response_code(400);
			echo json_encode($result);
		} else {
			http_response_code(200);
			echo json_encode($result);
		}
	}

	public static function destreoy (Request $request) : void {
		$result = FilmModel::destreoy($request->params());

		header('Content-Type: application/json');
		if ($result['status'] === 'error') {
			http_response_code(400);
			echo json_encode($result);
		} else {
			http_response_code(200);
			echo json_encode($result);
		}	
	}
}
?>