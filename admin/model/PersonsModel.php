<?php
namespace Admin\Model;
use Repository\PersonRepository;
use Core\Request;

class PersonsModel{
  
  public static function getAll () : void{
    $result = PersonRepository::getAll();
    
  }

  public static function personEdit (Request $request) : void{
    
  }

  public static function addPerson (Request $request) : void{
    
  }

  public static function edit (Request $request) : void{
    
  }

  public static function destroy (Request $request) : void{
    
  }
}





?>