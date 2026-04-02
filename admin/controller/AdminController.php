<?php

namespace Admin\Controller;
use Admin\Model;
use Admin\View;
class AdminController{
  public static function index ( ) {
    require __DIR__."/../View/home.php";
  }

}


?>