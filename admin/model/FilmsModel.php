<?php
namespace Admin\Model;
use Repository\FilmsRepository;
use Repository\FilmPersonsRepository;
use Repository\FilmPropertyRepository;
use Core\Response;
use Core\Storage;
class FilmsModel {

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
  }

  public static function addFilm(array $file, string $name): array {
    $result = Storage::addFileInStorage($file, $name, Storage::$filmsDir, Storage::$allowed['video']);
    if ($result["status"] === "error") return Response::array("error", $result);
    return Response::array("success", "Film uploaded", Storage::$filmsDir);
  }

  public static function addTrailer(array $file, string $name): array {
    $result = Storage::addFileInStorage($file, $name, Storage::$trailersDir, Storage::$allowed['video']);
    if ($result["status"] === "error") return Response::array("error", $result);
    return Response::array("success", "Trailer uploaded", Storage::$trailersDir);
  }

  public static function addMiniature(array $file, string $name): array {
    $result = Storage::addFileInStorage($file, $name, Storage::$miniatureDir, Storage::$allowed['image']);
    if ($result["status"] === "error") return Response::array("error", $result);
    return Response::array("success", "Miniature uploaded", Storage::$miniatureDir);
  }

  public static function deleteMiniature(string $id): array {
    return Storage::deleteDir(Storage::$miniatureDir . $id);
  }

  public static function deleteFilm(string $id): array {
    return Storage::deleteDir(Storage::$filmsDir . $id);
  }

  public static function deleteTrailer(string $id): array {
    return Storage::deleteDir(Storage::$trailersDir . $id);
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
  
  public static function delete($id): array {
    $id = $id["id"];
    FilmPropertyRepository::untugFromFilmId($id);
    FilmsRepository::destroy((string)$id);
    self::deleteMiniature($id);
    self::deleteFilm($id);
    self::deleteTrailer($id);
    return Response::array("success", "Film remove");
  }
}