
@extends('layouts.main')


@section('content')

		<div class="container-box">
				
				<h3>Change Password</h3>

				{{ Form::open(array('route' => array('save-password'), 'method' => 'post')) }}

		        <div class="form-group col-md-6">
		        	<div class="col-md-3" >
		            {{Form::label('cpassowrd','Current Password')}}
		        	</div>
		            <div class="col-md-9" >
		            {{Form::password('cpaasowrd',array('class' => 'form-control'))}}
		        	</div>
		        </div>

		         <div class="form-group col-md-6">
		        	<div class="col-md-3" >
		            {{Form::label('npassowrd','New Password')}}
		        	</div>
		            <div class="col-md-9" >
		            {{Form::password('npaasowrd',array('class' => 'form-control'))}}
		        	</div>
		        </div>

		        <div class="form-group col-md-6">
		        	<div class="col-md-3" >
		            {{Form::label('cnpassowrd','Confirm New Password')}}
		        	</div>
		            <div class="col-md-9" >
		            {{Form::password('cnpaasowrd',array('class' => 'form-control'))}}
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