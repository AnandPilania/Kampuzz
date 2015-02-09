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
	  		
	
			<script type="text/javascript">
				  // (function() {
				  //   var po = document.createElement('script');
				  //   po.type = 'text/javascript'; po.async = true;
				  //   po.src = 'https://plus.google.com/js/client:plusone.js';
				  //   var s = document.getElementsByTagName('script')[0];
				  //   s.parentNode.insertBefore(po, s);
				  // })();
			</script>
			

	  		 <!-- Add where you want your sign-in button to render -->
			<div id="gConnect">
			    <!-- <button id="signinButton" class="btn-social btn-google btn-block"
			        data-scope="https://www.googleapis.com/auth/plus.login"
			        data-requestvisibleactions="http://schemas.google.com/AddActivity"
			        data-clientId="{{ CLIENT_ID }}"
			        data-accesstype="online"
			        data-callback="onSignInCallback"
			         
			        data-theme="dark"
			         data-cookiepolicy="single_host_origin"
			        >
			    </button> -->
			</div>
			<div id="results"></div>
	  		</div>
	  	</div>
  </div>
 
<!-- Last part of BODY element in file index.html -->
<script>

function signInCallback(authResult) {
  // if (authResult['code']) {

  //   // Hide the sign-in button now that the user is authorized, for example:
  //   $('#signinButton').attr('style', 'display: none');

  //   // Send the code to the server
  //   $.ajax({
  //     type: 'POST',
  //     url: 'plus.php?storeToken',
  //     contentType: 'application/octet-stream; charset=utf-8',
  //     success: function(result) {
  //       // Handle or verify the server response if necessary.

  //       // Prints the list of people that the user has allowed the app to know
  //       // to the console.
  //       console.log(result);
  //       if (result['profile'] && result['people']){
  //         $('#results').html('Hello ' + result['profile']['displayName'] + '. You successfully made a server side call to people.get and people.list');
  //       } else {
  //         $('#results').html('Failed to make a server-side call. Check your configuration and console.');
  //       }
  //     },
  //     processData: false,
  //     data: authResult['code']
  //   });
  // } else if (authResult['error']) {
  //   // There was an error.
  //   // Possible error codes:
  //   //   "access_denied" - User denied access to your app
  //   //   "immediate_failed" - Could not automatially log in the user
  //   // console.log('There was an error: ' + authResult['error']);
  // }
}
</script>
@stop