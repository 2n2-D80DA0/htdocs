<?php
namespace Admin\Controller;
use Model;
use VieW;
use libs;

class PersonsController{

	public static function index (Request $request) : void {
		$films = personModel::getAll();
		http_response_code(200);
		require __DIR__ . '/../views/Persons.php';
	} 

	public static function make () : void {
		http_response_code(200);
		require __DIR__ . '/../views/personMake.php';
	} 

	public static function edit (Request $request) : void {
		http_response_code(200);
		$film = personModel::get($request->$id);
		require __DIR__ . '/../views/personEdit.php';
	}

	public static function updateFilm (Request $request) : void {
		$result = personModel::update($request->input("id"), $request->body());
		header('Content-Type: application/json');
		http_response_code(($result['status'] === 'error') ? (400) : (200));
		echo json_encode($result);
	} 

	public static function addFilm (Request $request) : void {
		$result = personModel::add($request->body());
		header('Content-Type: application/json');
		http_response_code(($result['status'] === 'error') ? (400) : (200));
		echo json_encode($result);
	}

	public static function destreoy (Request $request) : void {
		$result = personModel::destreoy($request->params());
		header('Content-Type: application/json');
		http_response_code(($result['status'] === 'error') ? (400) : (200));
		echo json_encode($result);
	}
}

?>