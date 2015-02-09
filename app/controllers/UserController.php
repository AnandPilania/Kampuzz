<?php

	
class UserController extends BaseController {

	
	public function __construct() {

		parent::__construct() ;
	}


	public function myProfile() {



		return View::make('user.profile',compact('profile')) ;

	}


	public function saveProfile() {
		
		return Redirect::to(route('home')) ;
	}


	public function changePassword() {

		return View::make('user.changepassword') ;
	}

	public function savePassword() {

		return Redirect::to(route('home')) ;
	}

	public function createPassword() {


	}


	public function verifyAccount() {

		
	}


	







} //end of class



?>