<?php

namespace User\Controller;

use Core\Response;
use Core\Request;
use User\Model\FilmsModel;
use User\Model\ParticipantsModel;
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
    $film_id = (int)$request->quest("id");
    $film = FilmsModel::getFilm($film_id);
    $genres = GenreModel::getAllOnFilm($film_id);
    $comments = CommentsModel::getCommentsByFilm($film_id);

    $ACTOR = ParticipantsModel::getActors($film_id);
    $PRODUCER = ParticipantsModel::getProducer($film_id);
    $DIRECTOR = ParticipantsModel::getDirectors($film_id);
    // echo("<pre>");
    // print_r($ACTOR);
    // print_r($PRODUCER);
    // print_r($DIRECTOR);
    require __DIR__."/../View/film.php";
  }
  public static function films (Request $request) : void {
  }


  public static function now (Request $request) {
    $page = $request->quest("page")?:1;
    $count = FilmsModel::filmCount("films")["count"];
    $limit = 1000;
    $films = FilmsModel::getStackFromNow(((int)$page % (int)$count) - 1,$limit);
    include (__DIR__."/../View/search.php");
  }
}

?>