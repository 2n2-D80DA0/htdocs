<?php

namespace Core;

use Core\Response;
use Core\Conect;
use Core\Storage;
use Core\Validator;

class Auth{
  protected $db;

  public function __construct()  {
    $this->db = Conect::pdo();
  }

  //Основной метод регистрации
  public function register(array $data, array $file): array  {
    $email = $data['email'] ?? '';
    $login = $data['login'] ?? '';
    $password = $data['password'] ?? '';
    $passwordConfirm = $data['passwordConfirm'] ?? '';
    
    $firstName = $data['first_name'] ?? '';
    $lastName = $data['last_name'] ?? '';
    $age = (int)($data['age'] ?? 0);
    // Валидация
    //проверка пароля 
    if ($passwordConfirm !== $password)
      return Response::array("error", "Passwords dont c");

    // проверка имейла
    if (!Validator::validateEmail($email)) 
      return Response::array("error", "Invalid email");

    // проверка логина
    if (!Validator::validateLogin($login)) 
      return Response::array("error", "Invalid login");

    if (!Validator::validateName($firstName))
      return Response::array("error", "Invalid first name");

    if (!Validator::validateName($lastName))
      return Response::array("error", "Invalid last name");


    // проверка пароля
    if (!Validator::validatePassword($password))
      return Response::array("error", "Small password");

    // проверка уникальности
    if ($this->emailExists($email)) 
      return Response::array("error", "Email already exists");

    // проверка логина
    if ($this->loginExists($login)) 
      return Response::array("error", "Login already exists");

    // хеширование
    $hash = password_hash($password, PASSWORD_BCRYPT);

    // создание пользователя надо в отдельный класс
    $stmt = $this->db->prepare("
      INSERT INTO users (email, login, password, name, namelast)
      VALUES (:email, :login, :password, :first_name, :last_name)
    ");
    $stmt->execute([
      'email' => $email,
      'login' => $login,
      'password' => $hash,
      'first_name' => $firstName,
      'last_name' => $lastName
    ]);

    $userId = (int)$this->db->lastInsertId();

    // сохранение изображения
    if (!empty($file)) {
      $upload = $this->uploadAvatar($file, $userId);
      if ($upload['status'] === 'error') {
        return $upload;
      }
    }

    return Response::array("success", "User created", [
      'id' => $userId,
      'email' => $email,
      'login' => $login,
      'first_name' => $firstName,
      'last_name' => $lastName
    ]);
  }
  
  public function login(array $data): array  {
    $email = trim($data['email'] ?? '');
    $password = $data['password'] ?? '';

    $stmt = $this->db->prepare("SELECT * FROM users WHERE email = :email LIMIT 1");
    $stmt->execute(['email' => $email]);

    $user = $stmt->fetch();

    if (!$user) 
      return Response::array("error", "User not found");

    if (!password_verify($password, $user['password'])) 
      return Response::array("error", "Invalid password");

    return Response::array("success", "Login success", $user);
  }


  protected function emailExists(string $email): bool  {
    $stmt = $this->db->prepare("SELECT id FROM users WHERE email = :email");
    $stmt->execute(['email' => $email]);
    return (bool)$stmt->fetch();
  }

  protected function loginExists(string $login): bool  {
    $stmt = $this->db->prepare("SELECT id FROM users WHERE login = :login");
    $stmt->execute(['login' => $login]);
    return (bool)$stmt->fetch();
  }

  protected function uploadAvatar(array $file, int $userId): array  {
    return Storage::addFileInStorage(
      $file,
      (string)$userId,
      Storage::$usersPhotoDir,
      Storage::$allowed['image']
    );
  }
}