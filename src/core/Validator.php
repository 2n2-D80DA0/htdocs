<?php
namespace Core;

class Validator{

  public static function validateEmail(string $email) : bool{
    return filter_var($email, FILTER_VALIDATE_EMAIL);
  }

  public static function validateLogin(string $login) : bool{
    return strlen($login) >= 3;
  }

  public static function validatePassword(string $password) : bool{
    return strlen($password) >= 6;
  }

  public static function validateName(string $name) : bool{
    return preg_match('/^[a-zA-Zа-яА-ЯёЁ]{2,30}$/u', $name);
  }
  
  public static function validateAge(int $age) : bool{
    return $age >= 1 && $age <= 120;
  }
}