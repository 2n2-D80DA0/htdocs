<?php

namespace Core;

class Session{
  protected static bool $started = false;

  public static function start(): void{
    if (self::$started === false) {
      session_start();
      self::$started = true;
    }
  }

  public static function destroy(): void{
    self::start();
    $_SESSION = [];
    session_destroy();
    self::$started = false;
  }

  public static function set(string $key, $value): void{
    self::start();
    $_SESSION[$key] = $value;
  }

  public static function get(string $key){
    self::start();
    return $_SESSION[$key] ?? null;
  }

  public static function remove(string $key): void{
    self::start();
    unset($_SESSION[$key]);
  }

  public static function login(array $data): void{   
    self::start();
    
    session_regenerate_id(true);
    $_SESSION["session_connect"] = true;
    foreach($data as $key => $value)
      $_SESSION[$key] = $value;
  }

  public static function logout(): void{
    self::destroy();
  }

  public static function isConnect(): bool{
    self::start();
    return ($_SESSION["session_connect"]??false);
  }

}