<?php

// ███████╗██╗███╗   ██╗██╗███████╗██╗  ██╗
// ██╔════╝██║████╗  ██║██║██╔════╝██║  ██║
// █████╗  ██║██╔██╗ ██║██║███████╗███████║
// ██╔══╝  ██║██║╚██╗██║██║╚════██║██╔══██║
// ██║     ██║██║ ╚████║██║███████║██║  ██║
// ╚═╝     ╚═╝╚═╝  ╚═══╝╚═╝╚══════╝╚═╝  ╚═╝

namespace Admin\Controller;
use Admin\Model;
use Admin\View;
class FilmPropertiesController{

	public static function filmLanguages () : void {
    $result = FilmPropertiesModel::filmLanguages($request->params());
		Response::jsonResponse($result);
	} 

  public static function filmGanres () : void {
    $result = FilmPropertiesModel::filmGanres($request->params());
		Response::jsonResponse($result);
	} 

  public static function filmsWithGanre (Request $request) : void {
    $result = FilmPropertiesModel::filmsWithGanre($request->params());
		Response::jsonResponse($result);
	}
  
  public static function filmsWithlanguage (Request $request) : void {
    $result = FilmPropertiesModel::filmsWithlanguage($request->params());
		Response::jsonResponse($result);
	}

	public static function linkLang () : void {
    $result = FilmPropertiesModel::unlinkLang($request->params());
		Response::jsonResponse($result);
	} 

  public static function unlinkLang () : void {
    $result = FilmPropertiesModel::unlinkLang($request->params());
		Response::jsonResponse($result);
	} 

  public static function linkGenre (Request $request) : void {
    $result = FilmPropertiesModel::linkGenre($request->params());
		Response::jsonResponse($result);
	}
  
  public static function unlinkGenre (Request $request) : void {
    $result = FilmPropertiesModel::unlinkGenre($request->params());
		Response::jsonResponse($result);
	}
}
?>