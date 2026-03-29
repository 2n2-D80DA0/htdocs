<?php

namespace Admin\Model;
use Repository\GenresRepository;

class GenreModel{

  public static function getAll () : array {
		return $films = GenresRepository::getAll();
	} 

  public static function add (string $enName,string $ruName) : array {
    return $films = GenresRepository::add($enName,$ruName);
	} 

  public static function edit (int $id,string $enName,string $ruName) : array {
    return $films = GenresRepository::edit();
	}
  
  public static function destreoy (int $id) : array {
    return $films = GenresRepository::destreoy();
	}
}
?>