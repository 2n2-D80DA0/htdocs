<?php
namespace Admin\Model;
use Repository\PersonRepository;
use Core\Response;
use Core\Storage;

class PersonsModel{

  public static function getAll () : array{
    $result = PersonRepository::getAll();
    return $result;
  }

  public static function add (string $name, string $namelastm, string $born, bool $gender, string $wiki, array $image) : array{
    $result = PersonRepository::add($name,$namelastm,$born,$gender,$wiki,$image);
    $filmId = self::addPhoto($image,$result);

    return Response::array("success", "perosn created", $result);
  }

  public static function personEdit () : array{
    
  }

  public static function addPerson () : array{
    
  }

  public static function edit () : array{
    
  }

  public static function destroy ($id) : array{
    $result = PersonRepository::destroy($id);
    return Response::array("success", "perosn created", $result);
  }



  public static function addPhoto  (array $file, string $name): array {
    $result = Storage::addFileInStorage($file, $name, Storage::$personsPhotoDir, Storage::$allowed['image']);
    if ($result["status"] === "error") return Response::array("error", $result);
    return Response::array("success", "Miniature uploaded", Storage::$personsPhotoDir);
  }


  public static function removePhoto(string $id): array {
    return self::deleteFile(self::$personsPhotoDir . $id);
  }


  public static function swopMiniature(array $file, string $name): array {
    $del = self::removePhoto($name);
    if ($del['status'] !== "success") return $del;
    return self::addPhoto($file, $name);
  }
  
}





?>