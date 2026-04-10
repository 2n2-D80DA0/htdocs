<?php
namespace Core;
require __DIR__. "/../../vendor/autoload.php";
use Admin\Controller;
use Core\Request;
use ReflectionMethod;

class Router
{
  protected static array $routes = [];

  protected string $uri;
  protected string $httpMethod;

  public static function match(string $uri, string $method) {
    // echo $uri;
    $uri = trim($uri, '/'); 
    if ($method === 'POST' && isset($_POST['method']))
      $method = strtoupper($_POST['method']);
    foreach (self::$routes as $route) {
      if ($route['method'] !== strtoupper($method))  continue;

      $pattern = '#^' . $route['uri'] . '$#u';
      // echo "<pre>";
      // var_dump($pattern,$uri,preg_match($pattern, $uri, $matc));

      if (preg_match($pattern, $uri, $matc)){
        $params = array_filter($matc, 'is_string', ARRAY_FILTER_USE_KEY);
        $params = array_map(function ($v) {
          return ctype_digit($v) ? (int)$v : $v;
        }, $params);
        $sum = [...$_POST,...$_GET];
        $request = new Request($sum, $params);
        return self::run($route['handler'], $request);
      }

        

    }
  
    http_response_code(404);
    echo "404";
  }

  public static function run(array $handler, Request $request) {
    [$class, $method] = $handler;
    $reflection = new ReflectionMethod($class, $method);
    if ($reflection->getNumberOfParameters() > 0) {
      return $class::$method($request);
    }
    return $class::$method();
  }

  protected static function add(string $uri, string|array $handler, string $httpMethod) : self {
    self::$routes[] = [
      'uri' => $uri,
      'handler' => $handler,
      'method' => $httpMethod
    ];
    return new self();
  }

  public static function get(string $uri, string|array $handler) : self {
    return self::add($uri, $handler, "GET");
  }

  public static function post(string $uri, string|array $handler) : self {
    return self::add($uri, $handler, "POST");
  }
  
  public static function patch(string $uri, string|array $handler) : self {
    return self::add($uri, $handler, "PATCH");
  }

  public static function put(string $uri, string|array $handler) : self {
    return self::add($uri, $handler, "ADD");
  }

  public static function delete(string $uri, string|array $handler) : self {
    return self::add($uri, $handler, "DELETE");
  }
}

?>