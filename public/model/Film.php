<?php
namespace Services;
use Assets\Lib;

class Film{
  private string $filmsDir = __DIR__ . '../../storage/films/';
  private string $trilersDir = __DIR__ . '../../storage/trailers/';
  private string $miniatureDir = __DIR__ . '../../storage/miniature/';

  public array $allowed = [
    'video' => ['mp4','mkv','avi'],
    'image' => ['jpg','jpeg','png','gif']
  ];

  // можно сделать кароче и читаемее но не буду \\
  private function addFileInStorage(array $file, string $name, string $dir, array $exts) : string|null {
    if ($file['error'] !== UPLOAD_ERR_OK)
      return "Upload error";
    $ext = strtolower(pathinfo($file['name'], PATHINFO_EXTENSION));
    if (!in_array($ext, $exts))
      return "Invalid file extension";

    $filename = $name . '.' . $ext;
    $target = $dir . $filename;

    if (!move_uploaded_file($file['tmp_name'], $target))
      return "Failed to move file";

    return null;
  }

  private function deleteFile(string $path) : array {
    if (!file_exists($path))
      return Lib::responseArray("error", "File does not exist", $path);

    if (!unlink($path))
      return Lib::responseArray("error", "Failed to delete file", $path);

    return Lib::responseArray("success", "File deleted successfully", $path);
  }


  // а это все можно было бы в контроллер перенести\\
  public function addFilm(array $file, string $name): array {
    $response = $this->addFileInStorage($file, $name, $this->filmsDir, $this->allowed['video']);
    if ($response)
      return Lib::responseArray("error", $response, "");

    return Lib::responseArray("success", "Film uploaded ok", $this->filmsDir . $name . '.' . pathinfo($file['name'], PATHINFO_EXTENSION));
  }

  public function addTrailer(array $file, string $name): array {
    $response = $this->addFileInStorage($file, $name, $this->trilersDir, $this->allowed['video']);
    if ($response) 
      return Lib::responseArray("error", $response, "");
      
    return Lib::responseArray("success", "Trailer uploaded successfully", $this->trilersDir . $name . '.' . pathinfo($file['name'], PATHINFO_EXTENSION));
  }

  public function addMiniature(array $file, string $name): array {
    $response = $this->addFileInStorage($file, $name, $this->miniatureDir, $this->allowed['image']);
    if ($response)
      return Lib::responseArray("error", $response, "");

    return Lib::responseArray("success", "Miniature uploaded successfully", $this->miniatureDir . $name . '.' . pathinfo($file['name'], PATHINFO_EXTENSION));
  }


  public function deleteMiniature(string $filename) : array {
    $path = $this->miniatureDir . $filename;
    return $this->deleteFile($path);
  }

  public function deleteFilm(string $filename) : array {
    $path = $this->filmsDir . $filename;
    return $this->deleteFile($path);
  }

  public function deleteTrailer(string $filename) : array {
    $path = $this->trilersDir . $filename;
    return $this->deleteFile($path);
  }


  public function swopFilm(array $file, string $name) : array {
    $del = $this->deleteFilm($name);
    if($del['status'] !== "success")
      return $del;
    $add = $this->addFilm($file,$name);
    if($add['status'] !== "success")
      return $del;
    return Lib::responseArray("success","film swop");
  }

  public function swopTrailer(array $file, string $name): array {
    $del = $this->deleteFilm($name);
    if($del['status'] !== "success")
      return $del;
    $add = $this->addFilm($file,$name);
    if($add['status'] !== "success")
      return $del;
    return Lib::responseArray("success","film swop");
  }

  public function swopMiniature(array $file, string $name): array {
    $del = $this->deleteFilm($name);
    if($del['status'] !== "success")
      return $del;
    $add = $this->addFilm($file,$name);
    if($add['status'] !== "success")
      return $del;
    return Lib::responseArray("success","film swop");
  }

  // создать в базе балванку фильма
  // заполнить туда трейлер фильм и икону
  // 
  public function relaseFilm (
    $name,$trailer,$miniatere,	$inStock
  ) : array {
    
  } 
  // [
  //   "name"=>$name
  //   "lor"=>"$lor"
  //   // "flm_src"=>""
  //   // "trailer_src"=>"$"
  //   // "miniature_src"=>"$src"
  //   "film_release"=>"$date"
  //   "duriation"=>""
  //   "name"=>""
  // ]



}

?>