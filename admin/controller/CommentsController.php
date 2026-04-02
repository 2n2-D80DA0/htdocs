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
class CommentController{    
    
  public static function delateComment(Request $request) {
    $result = CommentModel::delateComment($request->params());
		Response::jsonResponse($result);
  }

  public static function getFilmComments(Request $request) {
    $result = CommentModel::getFilmComments($request->params("filmId"));
		Response::jsonResponse($result);
  }

  public static function getUserComments(Request $request) {
    $result = CommentModel::getUserComments($request->params("userId"));
		Response::jsonResponse($result);
  }

  public static function getFilmCommentsPage(Request $request) {
    $result = CommentModel::getFilmComments($request->params("filmId"));
    $comments = $result["data"];
		require __DIR__ . '/../view/comments.php';
  }

  public static function getUserCommentsPage(Request $request) {
    $result = CommentModel::getUserComments($request->params("userId"));
    $comments = $result["data"];
		require __DIR__ . '/../view/comments.php';
  }
}

?>