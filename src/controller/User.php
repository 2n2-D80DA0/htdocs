<?php

namespace Controller;
use Assets\Lib;

class User{
  public function __construct(){

  }

  // ---------- Внутренние методы ----------
  // проверить совпадает ли пароль с имейлом
  protected function checkPassword(
    string $password,
    string $email
  ) : bool {

  
  }

  // Cравнить 2 пароля. 
  protected function comparePassword(
    string $password1,
    string $password2
  ) : bool {


  }

  // Проверить ник,имя,фамилию на запретки.
  protected function isBanWord(
    string $name
  ) : bool {


  }




  // ---------- Наружные методы ----------
  // логин
  public function login( 
    string $email, 
    string $password
  ) : string {

  }

  // завершить сессию.
  public function logout() : string {

  }

  // зарегестрировать аккаунт.
  public function register(
    string $login,
    string $name,
    string $namelast,
    string $password,
    string $sucsess_password,
    string $email
  ) : string {
      
  }

  // Обновить личные данные.
  public function update(
    array $data
  ) : string {

  }

  // Добавить комментарий.
  public function addComment(
    string $comment,
    int $videoId
  ) : string {

  }

  // Удалить комментарий.
  public function remComment(
    int $commentId
  ) : string {

  }

  //  Получить все свои комментарии.
  // public function getComments() : string{

  // }
}


?>