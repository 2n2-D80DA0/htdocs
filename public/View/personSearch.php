<?php

use User\Model\GenreModel;
require_once(__DIR__ . '/../Partials/blocks/htmlhead.php');
require_once(__DIR__ . '/../Partials/blocks/header.php');

require_once(__DIR__ . '/../Partials/blocks/person.php');

if(!$films){
  echo "ничего не найдено";
  
}else{
foreach($films as $film){
  require __DIR__."/../Partials/blocks/filmCard.php";
}
  
}


?>
