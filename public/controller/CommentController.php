<?php

namespace User\Controller;
use User\Model\FilmsModel;
use Core\Request;
use Core\Response;
use Core\Session;

class CommentController{    
    
  public static function delateComment(int $id) {
    
  }

  public static function addComment(Request $request) {
    
    if(!(Session::get()['id']??null))  Response::jsonResponse(Response::array('error','вы не вошли в аккаунт',1));
    if(!($request->quest("film_id")??null))  Response::jsonResponse(Response::array('error','фильм не найден',2));
    if(!($request->quest("comment")??null))  Response::jsonResponse(Response::array('error','комментарий не может быть пустым',3));
    if(strlen($request->quest("comment")<=1))  Response::jsonResponse(Response::array('error','слишком короткий коммент',4));
    
    Response::jsonResponse(
      CommentsModel::addComment(
        (int)Session::get()['id'],
        (int)$request->quest("film_id"),
        (string)$request->quest("comment")));
  }

  public static function pageCount (){
    $pdo = Conect::pdo();
    $stmt = $pdo->prepare("
      SELECT count(*) as count
      FROM films
    ");
    $stmt->execute();
    return $stmt->fetch();
  }

  public static function Comments (Request $request){
    $page = $request->quest("page")?:1;
    $count = FilmsModel::filmCount("films")["count"];
    $limit = 1000;
    // if(!$page){
    //   $page = 1;
    // }
    $films = FilmsModel::getStackFromComments(((int)$page % (int)$count)-1,$limit);
     include (__DIR__."/../View/search.php");
  }



}

?>