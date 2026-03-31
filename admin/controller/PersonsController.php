<?php

// ███████╗██╗███╗   ██╗██╗███████╗██╗  ██╗
// ██╔════╝██║████╗  ██║██║██╔════╝██║  ██║
// █████╗  ██║██╔██╗ ██║██║███████╗███████║
// ██╔══╝  ██║██║╚██╗██║██║╚════██║██╔══██║
// ██║     ██║██║ ╚████║██║███████║██║  ██║
// ╚═╝     ╚═╝╚═╝  ╚═══╝╚═╝╚══════╝╚═╝  ╚═╝

namespace Admin\Controller;
use Admin\Model\PersonsModel;
use Core\Request;

class PersonsController{

	public static function index (Request $request) : void {
		$films = PersonsModel::getAll();
		http_response_code(200);
		require __DIR__ . '/../view/Persons.php';
	} 

	public static function make () : void {
		http_response_code(200);
		require __DIR__ . '/../view/addPerson.php';
	} 

	public static function edit (Request $request) : void {
		http_response_code(200);
		$film = PersonsModel::get($request->input("id"));
		require __DIR__ . '/../view/personEdit.php';
	}

	public static function updateFilm (Request $request) : void {
		$result = PersonsModel::update($request->input("id"), $request->body());
		Response::jsonResponse($result);
	} 

	public static function addPerson (Request $request) : void {
		$result = PersonsModel::add($request->body());
		Response::jsonResponse($result);
	}

	public static function destreoy (Request $request) : void {
		$result = PersonsModel::destreoy($request->params());
		Response::jsonResponse($result);
	}
}

?>