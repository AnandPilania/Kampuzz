<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class User extends Eloquent implements UserInterface, RemindableInterface {

	use UserTrait, RemindableTrait;

	
	public $timestamps = 'true';


	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = array('password','forget_password_key');


	// public function profile() {

 //        return $this->hasOne('Profile','profile_id');
 //    }

   

    public function getRememberToken() {

		return $this->remember_token;
	}

	public function setRememberToken($value) {

		$this->remember_token = $value;
	}
	
	public function getRememberTokenName() {
		
		return 'remember_token';
	}

	/**
 * Get the unique identifier for the user.
 *
 * @return mixed
 */
public function getAuthIdentifier()

{
    return $this->getKey();
}

/**
 * Get the password for the user.
 *
 * @return string
 */
public function getAuthPassword()
{
    return $this->password;
}

/**
 * Get the e-mail address where password reminders are sent.
 *
 * @return string
 */
public function getReminderEmail()
{
    return $this->email;
}



}
