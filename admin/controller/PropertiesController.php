<?php
namespace Admin\Controller;
use Admin\Model;
use Admin\View;

class PropertiesController{
  public static function getLanguages () : void {
		$films = filmModel::getAll();
		http_response_code(200);
		require __DIR__ . '/../views/filmIndex.php';
	} 
  public static function addLanguage () : void {
		$films = filmModel::getAll();
		http_response_code(200);
		require __DIR__ . '/../views/filmIndex.php';
	} 
  public static function editLanguage (Request $request) : void {
		http_response_code(200);
		$film = filmModel::getFilm($request->$id);
		require __DIR__ . '/../views/filmEdit.php';
	}
  public static function deleteLanguage (Request $request) : void {
		http_response_code(200);
		$film = filmModel::getFilm($request->$id);
		require __DIR__ . '/../views/filmEdit.php';
	}

  public static function getGenreы () : void {
		$films = filmModel::getAll();
		http_response_code(200);
		require __DIR__ . '/../views/filmIndex.php';
	} 
  public static function addGenre () : void {
		$films = filmModel::getAll();
		http_response_code(200);
		require __DIR__ . '/../views/filmIndex.php';
	} 
  public static function editGenre (Request $request) : void {
		http_response_code(200);
		$film = filmModel::getFilm($request->$id);
		require __DIR__ . '/../views/filmEdit.php';
	}
  public static function deleteGenre (Request $request) : void {
		http_response_code(200);
		$film = filmModel::getFilm($request->$id);
		require __DIR__ . '/../views/filmEdit.php';
	}



}


?>
