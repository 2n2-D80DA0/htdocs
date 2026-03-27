<?php

namespace Controller;
use Admin\Model;
use Admin\View;
use libs;                  
class LanguageController{

  public static function getLanguages () : void {
		$films = LanguageModel::getAll();
		http_response_code(200);
		require __DIR__ . '/../views/Languages.php';
	} 

  public static function addLanguage (Request $request) : void {
    $result = LanguageModel::add($request->params());
		header('Content-Type: application/json');
    http_response_code(($result['status'] === 'error') ? (400) : (200));
		echo json_encode($result);
	} 

  public static function editLanguage (Request $request) : void {
    $result = LanguageModel::edit($request->index("id"),$request->params());
		header('Content-Type: application/json');
    http_response_code(($result['status'] === 'error') ? (400) : (200));
		echo json_encode($result);

	}
  
  public static function deleteLanguage (Request $request) : void {
    $result = LanguageModel::destreoy($request->index("id"));
		header('Content-Type: application/json');
    http_response_code(($result['status'] === 'error') ? (400) : (200));
    echo json_encode($result);
	}
}

?>