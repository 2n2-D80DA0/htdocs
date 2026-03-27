<?php

namespace Controller;
use Admin\Model;
use Admin\View;
use libs;

class GenreController{

  public static function getGenre () : void {
		$films = GenreModel::getAll();
		http_response_code(200);
		require __DIR__ . '/../views/Genres.php';
	} 

  public static function addGenre () : void {
    $result = GenreModel::add($request->params());
		header('Content-Type: application/json');
    http_response_code(($result['status'] === 'error') ? (400) : (200));
		echo json_encode($result);	
	} 

  public static function editGenre (Request $request) : void {
    $result = GenreModel::edit($request->params());
		header('Content-Type: application/json');
    http_response_code(($result['status'] === 'error') ? (400) : (200));
		echo json_encode($result);
	}
  
  public static function deleteGenre (Request $request) : void {
    $result = GenreModel::destreoy($request->params());
		header('Content-Type: application/json');
    http_response_code(($result['status'] === 'error') ? (400) : (200));
    echo json_encode($result);
	}
}

?>