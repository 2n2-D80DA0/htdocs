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
class FilmPersonsController{

  public static function filmLinkPeople (Request $request) : void {
    $result = FilmPersonsModel::filmLinkPeople($request->params("filmId"));
		Response::jsonResponse($result);
	}

  public static function peopleLinkFilm (Request $request) : void {
    $result = FilmPersonsModel::peopleLinkFilm($request->params("peopleId"));
		Response::jsonResponse($result);
	} 

  public static function addActor (Request $request) : void {
    $result = FilmPersonsModel::addActor($request->params("peopleId"),$request->params("filmId"));
		Response::jsonResponse($result);
	}
  
  public static function delActor (Request $request) : void {
    $result = FilmPersonsModel::delActor($request->params("peopleId"),$request->params("filmId"));
		Response::jsonResponse($result);
	}

  public static function addProducer (Request $request) : void {
    $result = FilmPersonsModel::addProducer($request->params("peopleId"),$request->params("filmId"));
		Response::jsonResponse($result);
	}
  
  public static function delProducer (Request $request) : void {
    $result = FilmPersonsModel::delProducer($request->params("peopleId"),$request->params("filmId"));
		Response::jsonResponse($result);
	}

  public static function addDirector (Request $request) : void {
    $result = FilmPersonsModel::addDirector($request->params("peopleId"),$request->params("filmId"));
		Response::jsonResponse($result);
	}
  
  public static function delDirector (Request $request) : void {
    $result = FilmPersonsModel::delDirector($request->params("peopleId"),$request->params("filmId"));
		Response::jsonResponse($result);
	}
}
?>