<?php

namespace user\Controller;
use User\Model\RatingModel;
use User\Model\FilmsModel;
use Core\Request;
use Core\Response;
use Core\Session;

class RatingController{
  public static function addRating (Request $request) : void{

    if(!(Session::get()['id']??null))  Response::jsonResponse(Response::array('error','вы не вошли в аккаунт',1));
    if(!($request->quest("film_id")??null))  Response::jsonResponse(Response::array('error','фильм не найден',2));
    if(!($request->quest("rating")??null))  Response::jsonResponse(Response::array('error','комментарий не может быть пустым',3));
    if(is_int($request->quest("rating")??null))  Response::jsonResponse(Response::array('error','комментарий не может быть пустым',4));

    Response::jsonResponse(
      RatingModel::setRating(
        (int)Session::get()['id'],
        (int)$request->quest("film_id"),
        (string)$request->quest("rating")));
  }
  public static function index (Request $request){
    $page = $request->quest("page")?:1;
    $count = FilmsModel::filmCount("films")["count"];
    $limit = 1000;
    $films = FilmsModel::getStackFromRating(((int)$page % (int)$count)-1,$limit);
    include (__DIR__."/../View/search.php");
  }
}

?>