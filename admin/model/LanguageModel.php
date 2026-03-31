<?php

namespace Admin\Model;
use Repository\LanguagesRepository;

class languageModel{

  public static function getAll () : array {
		return $result = LanguagesRepository::getAll();
	} 

  public static function add (string $enName, string $ruName) : void {
     $result = LanguagesRepository::add($enName,$ruName);
	} 

  public static function edit (int $id,string $enName,string $ruName) : void {
    // print_r($enName);
     $result = LanguagesRepository::edit( $id, $enName, $ruName);
	}
  
  public static function destreoy (int $id) : void {
    $result = LanguagesRepository::destreoy($id);
	}
}

?>