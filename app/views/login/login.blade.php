@extends('layouts.main')
<?php
	$breadcrumb_t = 'Login' ;

?>




@section('content')
	
	<div class="row">
	  	<div class="col-md-6">
	  		
	  			<h3>Please Enter Your Details</h3>

				{{ Form::open(array('route' => array('authentication'), 'method' => 'post')) }}

				<div class="form-group">
					<div class="col-lg-3"> {{ Form::label('email', 'Email:') }} </div>
 					<div class="col-lg-9">
								{{ Form::text('email', '', array('class' => 'form-control')) }}
					</div>
				</div>
 	
				<div class="form-group">
					<div class="col-lg-3"> {{ Form::label('password', 'Password:') }} </div>
		 			<div class="col-lg-9"> 
		 				{{ Form::password('password', array('class' => 'form-control')) }}
					</div>
				</div>
				<div class="row">
				<div class="form-group">
					<div class="col-lg-12">
						{{ Form::submit('Login', array('class' => 'btn-social btn btn-lg btn-info')) }}
					</div>
				</div>
				</div>

				{{ Form::close() }}
				<hr/>
				<p>Don't Have A Kampuzz Account? Click here to <a href="javascript:void(0);" id="loadSignin">Create Here</a></p>
	  	</div>

	  	<div class="col-md-1">

	  		<img src="{{ URL::asset('images/or-seperator-vertical.png') }}" />
	  	</div>

	  	<div class="col-md-5">

	  		<div class="socialLoginLinks clearfix"> 
	  		 <button class="btn-social btn-fb btn-block" onClick="window.location = '{{ $fbloginurl }}' ; ">Sign in with Facebook</button>   
	  		 <button class="btn-social btn-google" id="google-login-button">Sign in with Google</button> 
	  		 <!-- Add where you want your sign-in button to render -->
			<!-- <div id="signinButton">
			  <span class="g-signin"
			    data-scope="https://www.googleapis.com/auth/plus.login"
			    data-clientid="951301585811-7i42ojsjm75aqsqtapmk09335googbef.apps.googleusercontent.com"
			    data-redirecturi="postmessage"
			    data-accesstype="offline"
			    data-cookiepolicy="single_host_origin"
			    data-callback="signInCallback">
			  </span>
			</div>
			<div id="result"></div> -->
	  		</div>
	  	</div>
  </div>

@stop