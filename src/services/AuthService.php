<?php


namespace Services;
use Repository;

class AuthService{
  private User  $userRepository;

  public function __construct(User $userRepo) {
    $this->userRepository = $userRepo;
  }

  public function register(
    string $login,
    string $name,
    string $namelast,
    string $password,
    string $success_password,
    string $email
  ) : string {

    if($login)                                      return "empty login";
    if($name)                                       return "empty name";
    if($namelast)                                   return "empty namelast";
    if($password)                                   return "empty password";
    if($success_password)                           return "empty success_password";
    if($email)                                      return "empty email";
    if (strlen($password) < 8)                      return "The password must be at least 8 characters";
    if ($password !== $success_password)            return "passwords don't match";
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) return "email is already registered";
    // if ($this->userRepository->getByLogin($login))        return "Login is already taken";
    // if ($this->userRepository->getByEmail($email))        return "Email is already taken";
    
    $passwordHash = password_hash($password, PASSWORD_BCRYPT);
    // $result = $this->userRepository->createUser($login,$name,$namelast,$email,$passwordHash);
    if ($result["status"] == "error") 
      return $result["msg"];

    return \Lib();
  }
}


?>