<?php

use Facebook\FacebookSession;
use Facebook\FacebookRedirectLoginHelper;
use Facebook\FacebookRequest;
use Facebook\FacebookAuthorizationException;
use Facebook\FacebookRequestException;
use Facebook\GraphUser;



class LoginController extends BaseController {
	

	public function __construct() {
		parent::__construct() ;
		session_start();
		define('FB_APP_ID','926342340717478') ;
		define('FB_APP_SECRET','99dd9907707d8bba922bbc090adaf3c1') ;
		define('CLIENT_ID','951301585811-afnh7dae9un1a0g9b5qc6no916a2g0l7.apps.googleusercontent.com') ;
		define('APPLICATION_NAME','Kampuzz') ;
	}



	/*
		It checks if user is already login 
		//or a session already exists for user 
		// if yes , reidirect to user dashboard 
		// else return a login form .
		@input 
		@output redirect to dashboard or login form .
	*/
	public function login(){
		
		
		FacebookSession::setDefaultApplication(FB_APP_ID,FB_APP_SECRET);
		$redirect_url = route('fbSignUp') ;
		$helper = new FacebookRedirectLoginHelper($redirect_url);
		$fbloginurl = $helper->getLoginUrl(array('scope' => 'email')) ;

		$state = md5(rand());
		Session::set('g_state',$state) ;
		
		return View::make('login.login')->with('fbloginurl',$fbloginurl) ;
	}

	/*
		//It checks for authentication .

	*/
	public function authentication(){

		$username = Input::get('email') ;
		$password =	Input::get('password') ;

		 
         	$credentials = array(
                'email' => $username,
                'password' => $password
            );


            if(Auth::attempt($credentials)){	
                
                return Redirect::to(route('home'));
            } 
       
			return Redirect::to('login')->withInput()->with('message', 'Failed To Login');
	}


	public function register() {
		
		return View::make('login.registration') ;

	}


	public function signingUp() {

			$data = Input::only('email','name','password','mobile') ;
			
			$data['password'] = Hash::make($data['password']);
			$s = User::insert($data);
 
    	if($s) {
      		return Redirect::route('home') ; //->with('flash', 'The new user has been created');
    	} 
 
    return Redirect::route('register')->withInput()->withErrors($s->errors());
	}


	/*
	facebook signup .
	*/
	public function fbSignUp() {

		
		//	$fb_st ="CAANKefCZCoEwBAJFXFYBgqZApB4lzAdyVnWx4IrXvS8C65T0RkHdwUTZCYLnGLZA1L5M1uthNb7Dfh4hbdNxcajnzZBsOoWob5IFqWhx5FxHF8WSqqZB0j5UcLU6vSCIgpQ9f5V4TdBX6ltZB3AfTHNHsOMQZCxrZAtqzJGbwZAZAhl9hKfnCtIFFZABsfwT966hMBqUce1GZC4i02QD2qjivtnMX" ;
		FacebookSession::setDefaultApplication(FB_APP_ID,FB_APP_SECRET);
		$redirect_url = route('fbSignUp') ;
		$helper = new FacebookRedirectLoginHelper($redirect_url,FB_APP_ID,FB_APP_SECRET);
		try {
		    $session = $helper->getSessionFromRedirect();
		} catch(FacebookRequestException $ex) {
		    // When Facebook returns an error
		} catch(\Exception $ex) {
		    // When validation fails or other local issues
		}
		
		//$session = new FacebookSession($fb_st);
		if ($session) {
		  	// Logged in.
			//getting access token here.
			//	print_r($session) ;
			// $a = (string) $session->getAccessToken() ;
			try {

	    		$user_profile = (new FacebookRequest(
	      							$session, 'GET', '/me'
	    						))->execute()->getGraphObject(GraphUser::className());

	    	//	print_r($user_profile->asArray());
	    		$credentials = array(
                		'email' => $user_profile->getProperty("email") ,
                		'social_id' => $user_profile->getId(),
                	//	'social_access_token' => (string) $session->getAccessToken()
            	);

	    		$user = User::where($credentials)->first() ;


	    		if(!$user) {
            	
	    			$data = [
	    					'name' => $user_profile->getName() ,
	    					'email'=> $user_profile->getProperty("email"),
	    					'social_id' => $user_profile->getId() ,
	    					'social_entity_type' => 'Facebook',
	    					'gender' => $user_profile->getGender(),
	    					'is_verified' => $user_profile->getProperty('verified'),
	    					'social_access_token' => (string) $session->getAccessToken()
	    			] ;

	    			$s = User::insert($data);
	    			$user = User::where($credentials)->first() ;
	    		}

	    		if(Auth::login($user) || Auth::check()) {		
               		return Redirect::to(route('home'));
            	}
	    		// print_r($user) ;
	    		// exit();

	    		
 

	  		} catch(FacebookRequestException $e) {

	    				echo "Exception occured, code: " . $e->getCode();
	    				echo " with message: " . $e->getMessage();

	 		}   

		}
	}


	public function gSignUp() {

		define('CLIENT_ID','951301585811-14s57lhfp0rnd4srfdv4dfqil7gol9ph.apps.googleusercontent.com') ;
		define('APPLICATION_NAME','Kampuzz') ;
		 // Create a state token to prevent request forgery.
  		// Store it in the session for later validation.
		  // $state = md5(rand());
		  // Session::set('state',$state) ;
		  // Set the client ID, token state, and application name in the HTML while
		  // serving it.
		  // return $app['twig']->render('index.html', array(
		  //     'CLIENT_ID' => CLIENT_ID,
		  //     'STATE' => $state,
		  //     'APPLICATION_NAME' => APPLICATION_NAME
		  // ));

				    // Ensure that this is no request forgery going on, and that the user
		  // sending us this connect request is the user that was supposed to.
		  if ($request->get('state') != Session::get('g_state')){
		    return Response::make('Invalid state parameter', 401);
		  }


		  	$code = $request->getContent();
  			$gPlusId = $request->get['gplus_id'];
 
 			 // Exchange the OAuth 2.0 authorization code for user credentials.
  			$client->authenticate($code);

  $token = json_decode($client->getAccessToken());
  // Verify the token
  $reqUrl = 'https://www.googleapis.com/oauth2/v1/tokeninfo?access_token=' .
          $token->access_token;
  $req = new Google_HttpRequest($reqUrl);

  $tokenInfo = json_decode(
      $client::getIo()->authenticatedRequest($req)->getResponseBody());

  // If there was an error in the token info, abort.
  if ($tokenInfo->error) {
    return Response::make($tokenInfo->error, 500);
  }
  // Make sure the token we got is for the intended user.
  if ($tokenInfo->userid != $gPlusId) {
    return Response::make(
        "Token's user ID doesn't match given user ID", 401);
  }
  // Make sure the token we got is for our app.
  if ($tokenInfo->audience != CLIENT_ID) {
    return Response::make(
        "Token's client ID does not match app's.", 401);
  }

  	// Store the token in the session for later use.
 	 // $app['session']->set('token', json_encode($token));
  	return $response = 'Succesfully connected with token: ' . print_r($token, true);
  
  
	}



	/*
		it calls while logging out the user
	*/
	public function logout(){

		
		
		$session = FacebookSession::setDefaultApplication(FB_APP_ID,FB_APP_SECRET);
		$token = Auth::user()->social_access_token ;
		$session = new FacebookSession($token);
		$redirect_url = route('fbSignUp') ;
		$helper = new FacebookRedirectLoginHelper($redirect_url,FB_APP_ID,FB_APP_SECRET);
		$fblogouturl = $helper->getLogoutUrl($session,route('home')) ;
		Auth::logout(); // log the user out of our application
		Session::flush();
		return Redirect::to($fblogouturl) ;

		
		//unset the entire session.
		return Redirect::to('login') ; //->with('message','Logout Successfully , Bye ! Hope to see you soon') ;
	}

























} //end of user class


?>