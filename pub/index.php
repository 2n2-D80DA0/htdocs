<?php
$page = [
  "home" => "home.php",
  "profil" => "profile.php",
  "" => "home.php",
];
foreach($page as $key => $value){
  if($key == $_GET["route"]){
    require_once("pages/$value");
    
  }
}


?>