<?php

namespace Admin\Model;
use Repository\LanguagesRepository;

class languageModel{

  public static function getAll () : array {
		return $films = LanguagesRepository::getAll();
	} 

  public static function add (string $enName,string $ruName) : array {
    return $films = LanguagesRepository::add($enName,$ruName);
	} 

  public static function edit (int $id,string $enName,string $ruName) : array {
    return $films = LanguagesRepository::edit();
	}
  
  public static function destreoy (int $id) : array {
    return $films = LanguagesRepository::destreoy();
	}
}

?>