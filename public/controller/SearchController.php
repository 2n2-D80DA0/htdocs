<?php
namespace User\Controller;
use Core\Request;
use User\Model\SearchModel;
use User\Model\FilmsModel;

class SearchController{

  public static function index (Request $request){
    $page = $request->quest("page")??1;
    $count = FilmsModel::filmCount("films")["count"];
    $limit = 1000;
    $films = SearchModel::search($request->quest("param"),((int)$page % (int)$count)-1,$limit);
    include (__DIR__."/../View/search.php");

  }

  
  
}


?>