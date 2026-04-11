<?php

namespace User\Controller;

use Core\Response;
use Core\Request;
use Core\Storage;

use Repository\PersonRepository;


class PersonsController{

  public static function index (Request $request){

    $person = PersonRepository::getPerson($request->quest("person_id"));
    // print_r($person);
    $photo = Storage::getPerson($person["id"]);
    $films = PersonRepository::getStackFromPerson($person["id"]);
    include (__DIR__."/../View/Search.php");
  }


}