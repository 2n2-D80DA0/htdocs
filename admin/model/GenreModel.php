<?php

namespace Admin\Model;
use Repository\GenresRepository;

class GenreModel{

  public static function getAll () : array {
		return $films = GenresRepository::getAll();
	} 

  public static function add (string $enName, string $ruName) : void {
    $films = GenresRepository::add($enName,$ruName);
	} 

  public static function edit (int $id,string $enName,string $ruName) : void {
    $films = GenresRepository::edit( $id, $enName, $ruName);
	}
  
  public static function destreoy (int $id) : void {
    $films = GenresRepository::destreoy($id);
	}
}
?>