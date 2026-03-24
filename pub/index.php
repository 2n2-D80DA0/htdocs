<?php
require __DIR__ . '/../vendor/autoload.php';


$route = $_GET['route'] ?? 'home';
$params = $_REQUEST;
if (str_starts_with($route, 'api/')) {
    $route = substr($route, 4); 
    $parts = explode('/', $route);
    $class = $parts[0] ?? '';
    $method = $parts[1] ?? '';
    if (!$class || !$method) {
      echo Assets\Lib::message('error', 'invalid api request', '');
      exit;
    }
    $params['class'] = $class;
    $params['method'] = $method;
    $r = new Core\Router($params);
    echo $r->run();
} else {
  $page = [
    "" => "home.php",
    "home" => "home.php",
    "login" => "login.php",
    "profil" => "profile.php",
  ];
  foreach($page as $key => $value){
    if($key == $_GET["route"]){
      require_once("pages/$value");
      
    }
  }
}




?>