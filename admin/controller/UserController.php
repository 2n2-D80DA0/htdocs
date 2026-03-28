<?php

namespace Admin\Controller;
use Admin\Model;
use Admin\View;

class UserController{
	public static function banUser(Request $request) : void {
		$result = UsersModel::banUser($request->body());
		Response::jsonResponse($result);
	}
	public static function unbanUser(Request $request) : void {
		$result = UsersModel::banUser($request->body());
		Response::jsonResponse($result);;
	}
	public static function editUser(Request $request) : void {
		$result = UsersModel::banUser($request->body());
		Response::jsonResponse($result);
	}
	public static function editUserName() : void {

	}
	public static function editUserLogin() : void {

	}
	public static function editUserPassword() : void {

	}
	public static function editUserEmail() : void {

	}
	public static function UpgradeUserRole() : void {
 
	}
	public static function index() : void {
 
	}
	
}

?>