
@extends('layouts.main')


@section('content')

		<div class="container-box">
				
				<h3>Change Password</h3>

				{{ Form::open(array('route' => array('save-password'), 'method' => 'post')) }}

		        <div class="form-group col-md-6">
		        	<div class="col-md-3" >
		            {{Form::label('cpassword','Current Password')}}
		        	</div>
		            <div class="col-md-9" >
		            {{Form::password('cpassword',array('class' => 'form-control'))}}
		        	</div>
		        </div>

		         <div class="form-group col-md-6">
		        	<div class="col-md-3" >
		            {{Form::label('npassword','New Password')}}
		        	</div>
		            <div class="col-md-9" >
		            {{Form::password('npassword',array('class' => 'form-control'))}}
		        	</div>
		        </div>

		        <div class="form-group col-md-6">
		        	<div class="col-md-3" >
		            {{Form::label('cnpassword','Confirm New Password')}}
		        	</div>
		            <div class="col-md-9" >
		            {{Form::password('cnpassword',array('class' => 'form-control'))}}
		        	</div>
		        </div>
		        
		    
		         <div class="form-group col-md-6">
		         	<div class="col-md-12">
		        	{{Form::submit('Confirm Password', array('class' => 'btn-primary btn btn-sm pull-right'))}}
		       		</div>
		       	</div>

				

				{{ Form::close() }}
		</div>

@stop