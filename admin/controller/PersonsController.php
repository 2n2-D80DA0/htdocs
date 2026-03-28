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

class PersonsController{

	public static function index (Request $request) : void {
		$films = personModel::getAll();
		http_response_code(200);
		require __DIR__ . '/../view/Persons.php';
	} 

	public static function make () : void {
		http_response_code(200);
		require __DIR__ . '/../view/personMake.php';
	} 

	public static function edit (Request $request) : void {
		http_response_code(200);
		$film = personModel::get($request->input("id"));
		require __DIR__ . '/../view/personEdit.php';
	}

	public static function updateFilm (Request $request) : void {
		$result = personModel::update($request->input("id"), $request->body());
		Response::jsonResponse($result);
	} 

	public static function addFilm (Request $request) : void {
		$result = personModel::add($request->body());
		Response::jsonResponse($result);
	}

	public static function destreoy (Request $request) : void {
		$result = personModel::destreoy($request->params());
		Response::jsonResponse($result);
	}
}

?>