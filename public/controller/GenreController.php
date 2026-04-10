<?php

namespace User\Controller;

use Core\Response;
use Core\Request;
use User\Model\GenreModel;

class GenreController{
  public static function index (Request $request){

    $page = $request->quest("page")?:1;
    $genre = $request->quest("genre_id");
    $count = GenreModel::filmCountFromGenre($genre);
    $limit = 1000;
    $films = GenreModel::getStackFromGenre($genre);
    include (__DIR__."/../View/search.php");
  }


}