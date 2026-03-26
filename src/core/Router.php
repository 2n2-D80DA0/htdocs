<?php
namespace Core;
  // declare(strict_types=1);
class Router
{
  protected static array $routes = [];

  protected string $uri;
  protected string $httpMethod;

  public static function only(string $middleware) : void{
    self::$routes[count(self::$routes)-1]["middleware"] = $middleware;
  }

  public static function match(string $uri, string $method){
    echo"g";
    $uri = trim($uri, '/');
    $method = strtoupper($method);

    foreach (self::$routes as $route) {
      if ($route['uri'] === $uri && $route['method'] === $method) {
        return self::run(...$route['handler']);
      }
    }
    http_response_code(404);
    header("location:/404");
  }

  protected static function run(string $class, string $method){
    $controller = new $class();
    return $controller->$method();
  }

  protected static function add(string $uri, string|array $handler, string $httpMethod) : self {
    self::$routes[] = [
      'uri' => $uri,
      'handler' => $handler,
      'method' => $httpMethod,
      'middleware' => false
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
}

?>