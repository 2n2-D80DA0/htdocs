<?php
namespace Core;
use Core\Response;
class Storage{
  public static string $filmsDir = __DIR__ . '/../../storage/films/';
  public static string $trailersDir = __DIR__ . '/../../storage/trailers/';
  public static string $miniatureDir = __DIR__ . '/../../storage/miniature/';
  public static string $personsPhotoDir = __DIR__ . '/../../storage/personsPhotoDir/';

  public static array $allowed = [
    'video' => ['mp4','mkv','avi'],
    'image' => ['jpg','jpeg','png','gif','webp']
  ];

  public static function addFileInStorage(array $file, string $name, string $dir, array $exts) : array {
    if ($file['error'] !== 0) return Response::array("error","Upload error");
    $EXTENSION = strtolower(pathinfo($file['name'], PATHINFO_EXTENSION));
    if (!in_array($EXTENSION,$exts)) return Response::array("error","Invalid file extension");
    $filedir = $dir . $name . "/";
    if (!is_dir($filedir))  mkdir($filedir, 0777, true);
    $target = $filedir . $name . '.' . $EXTENSION;
    if (!move_uploaded_file($file['tmp_name'], $target))  return Response::array("error","Failed to move file");
    return Response::array("success", "File create successfully");
  }

  public static function deleteDir(string $dir): array {
    if (!is_dir($dir)) return Response::array("error", "file does not exist", $dir);
    $files = scandir($dir);
    foreach ($files as $file) {
      if ($file === '.' || $file === '..') continue;
      $filePath = $dir . '/' . $file;
      if (!is_file($filePath)) return Response::array("error", "delate error", $filePath);
      if (!unlink($filePath)) return Response::array("error", "delate error", $filePath);
    }
    if (!rmdir($dir)) return Response::array("error", "delate error", $dir);
    return Response::array("success", "delated successfully", $dir);
  }
}