<?php

namespace User\Controller;
use Core\Response;
use Core\Request;
use Core\Auth;
use Core\Session;


class UserController{

	static public function register(Request $request) {
		$data = [
			"password" => $request->quest("password"),
			"email" => $request->quest("email"),
			"login" => $request->quest("nick"),
			"first_name" => $request->quest("name"),
			"last_name" => $request->quest("lastname"),
			"passwordConfirm" => $request->quest("passwordConfirm")
		];
		$Auth = new Auth();
		$result = $Auth->register($data,$_FILES["avatar"]);
		if($result['status'] === "success")
			Session::login($result["data"]);
		Response::jsonResponse($result);
	}

	static public function login (Request $request) {
		$data = [
			"password" => $request->quest("password"),
			"email" => $request->quest("email")
		];
		$Auth = new Auth();
		$result = $Auth->login($data);
		if($result['status'] === "success")
			Session::login($result["data"]);
		Response::jsonResponse($result);
	}

	static public function loginPage () {
		require __DIR__."/../View/login.php";
	}

	static public function registerPage () {
		require __DIR__."/../View/register.php";
	}

	static public function logout () {
		Session::logout();
		// echo PROJ_DIR."home";
		header("Location:".BASE_URL."/home");
	}

	static public function setRating (Request $request){
		
	}
	static public function deleteRating (Request $request){
		
	}
	
	
	
}

?>