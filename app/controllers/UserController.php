<?php

	
class UserController extends BaseController {

	
	public function __construct() {

		parent::__construct() ;
	}


	public function myProfile() {



		return View::make('user.profile',compact('profile')) ;

	}


	public function saveProfile() {

		$data = Input::only('email','name','gender','mobile') ;

		$user = User::find(Auth::user()->id);
		$user->email = $data['email'] ;
		$user->name = $data['name'] ;
		$user->gender = $data['gender'] ;
		$user->mobile = $data['mobile'] ;
		if($user->save()) {
		return Redirect::to(route('home')) ;
		}
	}


	public function changePassword() {

		return View::make('user.changepassword') ;
	}

	public function savePassword() {

		$data = Input::only('cpassword','npassword','cnpassword') ;

		$user = User::find(Auth::user()->id);
		if(($user->password == Hash::make($data['cpassword'])) && $data['cpassword']) {

			if($data['npassword'] == $data['cnpassword']) {
				
				$user->password = $data['npassword'] ;
				if($user->save()) {
					return Redirect::to(route('home')) ;
				}

				return Redirect::to(route('change-password'))->withInput()->with('message','New Password and Confirm Password Doesn\'t Match') ;
			}	
		}

		return Redirect::to(route('change-password'))->withInput()->with('message','Current Password Is Incorrect') ;
	}

	public function createPassword() {


	}


	public function verifyAccount() {

		
	}


	







} //end of class



?>