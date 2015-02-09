
@extends('layouts.main')


@section('content')

		</div class="container-box">
				
				<h3>My Profile</h3>

				{{ Form::open(array('route' => array('save-profile'), 'method' => 'get')) }}

		        <div class="form-group col-md-6">
		        	<div class="col-md-3" >
		            {{Form::label('email','Email')}}
		        	</div>
		            <div class="col-md-9" >
		            {{Form::text('email',Auth::user()->email,array('class' => 'form-control'))}}
		        	</div>
		        </div>

		        <div class="form-group col-md-6">
		        	<div class="col-md-3" >
		            {{Form::label('name','Name')}}
		            </div>
		            <div class="col-md-9" >
		            {{Form::text('name',Auth::user()->name,array('class' => 'form-control'))}}
		        </div>

		        </div>
		        <div class="form-group col-md-6">
		        	<div class="col-md-3" >
		            {{Form::label('mobile','Mobile')}}
		            </div>
		            <div class="col-md-9" >
		            {{Form::text('mobile',Auth::user()->mobile,array('class' => 'form-control'))}}
		        </div>
		        	
		        </div>
		        
		        <div class="form-group col-md-6">
		        	<div class="col-md-3" >
		            {{Form::label('gender','Gender')}}
		            </div>
		            <div class="col-md-9" >
		            {{Form::radio('gender','fghghf',array('class' => 'form-control','options'=>['Male'=>'Male','Female'=>'Female']))}}
		        	</div>
		        </div>
		         <div class="form-group row">
		         	<div class="col-md-12">
		        	{{Form::submit('Edit Profile', array('class' => 'btn-primary btn btn-sm pull-right'))}}
		       		</div>
		       	</div>

				

				{{ Form::close() }}
		</div>

@stop