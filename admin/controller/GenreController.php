<?php
// ███████╗██╗███╗   ██╗██╗███████╗██╗  ██╗
// ██╔════╝██║████╗  ██║██║██╔════╝██║  ██║
// █████╗  ██║██╔██╗ ██║██║███████╗███████║
// ██╔══╝  ██║██║╚██╗██║██║╚════██║██╔══██║
// ██║     ██║██║ ╚████║██║███████║██║  ██║
// ╚═╝     ╚═╝╚═╝  ╚═══╝╚═╝╚══════╝╚═╝  ╚═╝

namespace Admin\Controller;
use Admin\Model\GenreModel;
use Core\Request;

class GenreController{

  public static function getGenres (Request $request) : void {
		$genres = GenreModel::getAll();
		http_response_code(200);
		require __DIR__ . '/../view/Genres.php';
	} 

  public static function addGenre (Request $request) : void {
    $result = GenreModel::add($request->quest("en_name"),$request->quest("ru_name"));
    header("Location: http://localhost/admin/genres");
		// Response::jsonResponse($result);
	} 

  public static function editGenre (Request $request) : void {
    $result = GenreModel::edit($request->quest("id"),$request->quest("en_name"),$request->quest("ru_name"));
    header("Location: http://localhost/admin/genres");
		// Response::jsonResponse($result);
	}
  
  public static function deleteGenre (Request $request) : void {
    $result = GenreModel::destreoy($request->quest("id"));
    header("Location: http://localhost/admin/genres");
		// Response::jsonResponse($result);
	}
}

?>