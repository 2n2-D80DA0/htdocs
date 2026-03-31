<?php
namespace Admin\Model;
use Repository\FilmsRepository;
use Core\Response;
class FilmsModel {

  private static string $filmsDir = __DIR__ . '/../../storage/films/';
  private static string $trailersDir = __DIR__ . '/../../storage/trailers/';
  private static string $miniatureDir = __DIR__ . '/../../storage/miniature/';

  public static array $allowed = [
    'video' => ['mp4','mkv','avi'],
    'image' => ['jpg','jpeg','png','gif','webp']
  ];

  private static function addFileInStorage(array $file, string $name, string $dir, array $exts) : array {
    if ($file['error'] !== 0) return Response::array("error","Upload error");
    $EXTENSION = strtolower(pathinfo($file['name'], PATHINFO_EXTENSION));
    if (!in_array($EXTENSION,$exts)) return Response::array("error","Invalid file extension");
    $filedir = $dir . $name . "/";
    if (!is_dir($filedir))  mkdir($filedir, 0777, true);
    $target = $filedir . $name . '.' . $EXTENSION;
    if (!move_uploaded_file($file['tmp_name'], $target))  return Response::array("error","Failed to move file");
    return Response::array("success", "File create successfully");
  }

  private static function deleteDir(string $dir): array {
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

  public static function getAll(): array {
    return FilmsRepository::getAll();
  }

  public static function getFilm(int $id): array {
    return FilmsRepository::getFilm($id);
  }

  public static function add(array $props, array $poster, array $trailer, array $film): array {
    $filmId = FilmsRepository::addFilm($props);
    $filmRes = self::addFilm($film, (string)$filmId);
    if ($filmRes['status'] !== 'success') return $filmRes;
    $trailerRes = self::addTrailer($trailer, (string)$filmId);
    if ($trailerRes['status'] !== 'success') return $trailerRes;
    $posterRes = self::addMiniature($poster, (string)$filmId);
    if ($posterRes['status'] !== 'success') return $posterRes;
    return Response::array("success", "Film created", $filmId);
    return Response::array("error", $e->getMessage()); 
  }

  public static function addFilm(array $file, string $name): array {
    $result = self::addFileInStorage($file, $name, self::$filmsDir, self::$allowed['video']);
    if ($result["status"] === "error") return Response::array("error", $result);
    return Response::array("success", "Film uploaded", self::$filmsDir);
  }

  public static function addTrailer(array $file, string $name): array {
    $result = self::addFileInStorage($file, $name, self::$trailersDir, self::$allowed['video']);
    if ($result["status"] === "error") return Response::array("error", $result);
    return Response::array("success", "Trailer uploaded", self::$trailersDir);
  }

  public static function addMiniature(array $file, string $name): array {
    $result = self::addFileInStorage($file, $name, self::$miniatureDir, self::$allowed['image']);
    if ($result["status"] === "error") return Response::array("error", $result);
    return Response::array("success", "Miniature uploaded", self::$miniatureDir);
  }


  public static function deleteMiniature(string $id): array {
    return self::deleteFile(self::$miniatureDir . $id);
  }

  public static function deleteFilm(string $id): array {
    return self::deleteFile(self::$filmsDir . $id);
  }

  public static function deleteTrailer(string $id): array {
    return self::deleteFile(self::$trailersDir . $id);
  }


  public static function swopFilm(array $file, string $name): array {
    $del = self::deleteFilm($name);
    if ($del['status'] !== "success") return $del;
    return self::addFilm($file, $name);
  }

  public static function swopTrailer(array $file, string $name): array {
    $del = self::deleteTrailer($name);
    if ($del['status'] !== "success") return $del;
    return self::addTrailer($file, $name);
  }

  public static function swopMiniature(array $file, string $name): array {
    $del = self::deleteMiniature($name);
    if ($del['status'] !== "success") return $del;
    return self::addMiniature($file, $name);
  }
}