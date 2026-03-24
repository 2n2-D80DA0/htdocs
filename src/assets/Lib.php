<?php
namespace Assets;
class Lib {
  static function responseArray($status,$msg="",$data=null): array{
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
}
