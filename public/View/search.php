<?php

use User\Model\GenreModel;
require_once(__DIR__ . '/../Partials/blocks/htmlhead.php');
require_once(__DIR__ . '/../Partials/blocks/header.php');
if(!$films){
  echo "ничего не найдено";
}

foreach($films as $film){

  $genres = GenreModel::getAllOnFilm($film["id"]);

  require __DIR__."/../Partials/blocks/filmCard.php";
}
  
?>
