<?php
// ██╗   ██╗███╗   ██╗
// ██║   ██║████╗  ██║
// ██║   ██║██╔██╗ ██║
// ██║   ██║██║╚██╗██║
// ╚██████╔╝██║ ╚████║
//  ╚═════╝ ╚═╝  ╚═══╝
                   
// ███████╗██╗███╗   ██╗██╗███████╗██╗  ██╗
// ██╔════╝██║████╗  ██║██║██╔════╝██║  ██║
// █████╗  ██║██╔██╗ ██║██║███████╗███████║
// ██╔══╝  ██║██║╚██╗██║██║╚════██║██╔══██║
// ██║     ██║██║ ╚████║██║███████║██║  ██║
// ╚═╝     ╚═╝╚═╝  ╚═══╝╚═╝╚══════╝╚═╝  ╚═╝
                                        
namespace Admin\Controller;
use Core\Request;
use Admin\Model\LanguageModel;

class LanguageController{

  public static function getLanguages (Request $request) : void {
		$languages = LanguageModel::getAll();
		http_response_code(200);
		require __DIR__ . '/../view/Languages.php';
	} 

  public static function addLanguage (Request $request) : void {
    $result = LanguageModel::add($request->quest("en_name"),$request->quest("ru_name"));
    Response::jsonResponse($result);
	} 

  public static function editLanguage (Request $request) : void {
    $result = LanguageModel::edit($request->quest("id"),$request->quest("en_name"),$request->quest("ru_name"));
		Response::jsonResponse($result);
	}
  
  public static function deleteLanguage (Request $request) : void {
    $result = LanguageModel::destreoy($request->quest("id"));
		Response::jsonResponse($result);
	}
}

?>