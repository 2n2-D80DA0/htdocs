<?php

namespace User\Controller;

use Core\Response;
use Core\Request;
use User\Model\FilmsModel;
use User\Model\GenreModel;
use User\Model\CommentsModel;

class FilmsController{ 
  public static function index(Request $request) : void{
    $filmsSector = [
      [
        "header" => "topRating",
        "href" => "href",
        "films" => FilmsModel::getStackFromRating()
      ],
      [
        "header" => "topComments",
        "href" => "href",
        "films" => FilmsModel::getStackFromComments()
      ],
      [
        "header" => "now",
        "href" => "href",
        "films" => FilmsModel::getStackFromNow(),
      ]
    ];
    require __DIR__."/../View/home.php";
  }
  public static function watch (Request $request) : void {
    $film = FilmsModel::getFilm($request->quest("id"));
    $genres = GenreModel::getAllOnFilm($request->quest("id"));
    $comments = CommentsModel::getCommentsByFilm($request->quest("id"));



    require __DIR__."/../View/film.php";
  }
  public static function films (Request $request) : void {
    // require __DIR__."/../View/film.php";
  }
}

?>