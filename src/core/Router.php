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
    $uri = trim($uri, '/');
    if ($method === 'POST' && isset($_POST['_method']))
      $method = strtoupper($_POST['_method']);
    
    foreach (self::$routes as $route) {
      if ($route['method'] !== $method)
        continue;
      
      $pattern = '#^' . $route['uri'] . '$#';

      if (preg_match($pattern, $uri, $matc)){
        
        $params = array_filter($matc, 'is_string', ARRAY_FILTER_USE_KEY);
        
        $params = array_map(function ($v) {
          return ctype_digit($v) ? (int)$v : $v;
        }, $params);
        // print_r($params);
        $request = new Request($_POST, $params);
        // print_r($params);
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
    return self::add($uri, $handler, "PUT");
  }

  public static function delete(string $uri, string|array $handler) : self {
    return self::add($uri, $handler, "DELETE");
  }
}

?>