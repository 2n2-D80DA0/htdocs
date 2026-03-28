<?php
// ███████╗██╗███╗   ██╗██╗███████╗██╗  ██╗
// ██╔════╝██║████╗  ██║██║██╔════╝██║  ██║
// █████╗  ██║██╔██╗ ██║██║███████╗███████║
// ██╔══╝  ██║██║╚██╗██║██║╚════██║██╔══██║
// ██║     ██║██║ ╚████║██║███████║██║  ██║
// ╚═╝     ╚═╝╚═╝  ╚═══╝╚═╝╚══════╝╚═╝  ╚═╝

namespace Controller;
use Admin\Model;
use Admin\View;
use libs;

class GenreController{

  public static function getGenre () : void {
		$films = GenreModel::getAll();
		http_response_code(200);
		require __DIR__ . '/../view/Genres.php';
	} 

  public static function addGenre () : void {
    $result = GenreModel::add($request->params());
		Response::jsonResponse($result);
	} 

  public static function editGenre (Request $request) : void {
    $result = GenreModel::edit($request->params());
		Response::jsonResponse($result);
	}
  
  public static function deleteGenre (Request $request) : void {
    $result = GenreModel::destreoy($request->params());
		Response::jsonResponse($result);
	}
}

?>