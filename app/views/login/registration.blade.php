<?php
	$breadcrumb_t = 'Registration' ;
?>

@extends('layouts.main')


@section('content')


	<div class="row">
	  	<div class="col-md-5">

				<h3>Create a Kampuzz Account</h3>

				{{ Form::open(array('route' => array('signingUp'), 'method' => 'post')) }}

		        <div class="form-group">
		        	<div class="col-md-3" >
		            {{Form::label('email','Email')}}
		        	</div>
		            <div class="col-md-9" >
		            {{Form::text('email', null,array('class' => 'form-control'))}}
		        	</div>
		        </div>

		        <div class="form-group">
		        	<div class="col-md-3" >
		            {{Form::label('name','Name')}}
		            </div>
		            <div class="col-md-9" >
		            {{Form::text('name', null,array('class' => 'form-control'))}}
		        </div>

		        </div>
		        <div class="form-group">
		        	<div class="col-md-3" >
		            {{Form::label('mobile','Mobile')}}
		            </div>
		            <div class="col-md-9" >
		            {{Form::text('mobile', null,array('class' => 'form-control'))}}
		        </div>
		        	
		        </div>
		        
		        <div class="form-group">
		        	<div class="col-md-3" >
		            {{Form::label('password','Password')}}
		            </div>
		            <div class="col-md-9" >
		            {{Form::password('password',array('class' => 'form-control'))}}
		        	</div>
		        </div>
		         <div class="form-group">
		         	<div class="col-md-12">
		        	{{Form::submit('Create An Account', array('class' => 'btn-lg btn btn-primary btn-social'))}}
		       		</div>
		       	</div>

				

				{{ Form::close() }}
				<hr/>
				<p>Already a Kampuzz account? Click here to <a href="javascript:void(0);" id="loadSignin">Login</a></p>
	  	</div>

	  	<div class="col-md-1">

	  		<img src="{{ URL::asset('images/or-seperator-vertical.png') }}" />
	  	</div>

	  	<div class="col-md-5">

	  		<div class="socialLoginLinks clearfix"> 
	  		 <button class="btn-social btn-fb" onClick="FBLogin();">Sign in with Facebook</button>   
	  		 <button class="btn-social btn-google" id="google-login-button">Sign in with Google</button> </div>
	  	</div>
  </div>

@stop