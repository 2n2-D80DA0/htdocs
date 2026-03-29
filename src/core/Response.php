<?php
namespace Core;
class Response {

  static function array($status,$msg="",$data=null): array{
    return [
      "status" => $status,
      "msg" => $msg,
      "data" => $data
    ];
  }  

  static function message($status,$msg="",$data=null): string{
    return json_encode([
      "status" => $status,
      "msg" => $msg,
      "data" => $data
    ]);
  }  
  
  static function decodeMessage($str): array{
    return json_decode($str, true);
  }  
  
  static function randomSimvols(int $length = 12) : string {
    $chars = 'abcdefghijklmnopqrstuvwxyz0123456789';
    $name = '';
    for ($i = 0; $i < $length; $i++) {
      $name .= $chars[random_int(0, strlen($chars) - 1)];
    }
    return $name;
  }

  static function jsonResponse(array $result): void {
    header('Content-Type: application/json');
    http_response_code($result['status'] === 'error' ? 400 : 200);
    echo json_encode($result);
  }
}

