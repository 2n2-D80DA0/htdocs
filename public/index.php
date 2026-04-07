<?php
require __DIR__. "/../vendor/autoload.php";
require __DIR__. "/../globs.php";
require __DIR__. "/routes.php";
use Core\Router;
use Core\Session;


if($_SERVER['REQUEST_METHOD'] === "GET"){
  Router::match($_SERVER['REDIRECT_URL'],"GET");
}else {
  $file = 'data.txt';
  file_put_contents($file,"files" . serialize($_FILES)."\n", FILE_APPEND);
  file_put_contents($file,"post" . serialize($_POST)."\n", FILE_APPEND);
  Router::match($_SERVER['REDIRECT_URL'], $_POST["action"]);
}

?>