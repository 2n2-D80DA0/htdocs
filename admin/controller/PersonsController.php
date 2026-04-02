<?php

// ███████╗██╗███╗   ██╗██╗███████╗██╗  ██╗
// ██╔════╝██║████╗  ██║██║██╔════╝██║  ██║
// █████╗  ██║██╔██╗ ██║██║███████╗███████║
// ██╔══╝  ██║██║╚██╗██║██║╚════██║██╔══██║
// ██║     ██║██║ ╚████║██║███████║██║  ██║
// ╚═╝     ╚═╝╚═╝  ╚═══╝╚═╝╚══════╝╚═╝  ╚═╝

namespace Admin\Controller;
use Admin\Model\PersonsModel;
use Core\Response;
use Core\Request;

class PersonsController{

	public static function index (Request $request) : void {
		$persons = PersonsModel::getAll();
    // print_r($persons);
		http_response_code(200);
		require __DIR__ . '/../view/Persons.php';
	} 

	public static function make (Request $request) : void {
		http_response_code(200);
		require __DIR__ . '/../view/addPerson.php';
	} 

	public static function edit (Request $request) : void {
		http_response_code(200);
		$film = PersonsModel::get($request->input("id"));
		require __DIR__ . '/../view/personEdit.php';
	}

	public static function updatePerson (Request $request) : void {
		$result = PersonsModel::update($request->input("id"), $request->body());
		Response::jsonResponse($result);
	} 

	public static function addPerson (Request $request) : void {
		$result = PersonsModel::add($request->quest("name"),$request->quest("namelast"),$request->quest("born"),(bool)$request->quest("gender"),$request->quest("wiki"),$_FILES["image"]);
		Response::jsonResponse($result);
	}

	public static function destroy (Request $request) : void {
		$result = PersonsModel::destroy($request->params());
		Response::jsonResponse($result);
	}
}

?>