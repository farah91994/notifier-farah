@extends('layouts.master')
@include('includes.header2')  
@section('title')
    SignIn
@endsection
@section('content')
	@if (session('status'))
		<div class="alert alert-success">
			{{ session('status') }}
		</div>
	@endif
         <div class="center-block Box-signin"style="background-color: rgba(245,245,245,0.9);margin-top: 40px">
		   <h3>Sign In </h3>
		   <form action="{{ route('signin')}}" method="post">
		       <div class="form-group @if ($errors->has('email')) has-error @endif">
					<label for="email">Email</label>
					<input class="form-control" maxlength="30" placeholder="email" type="text" name="email" id="email" value="{{ Request:: old('email')}}">
					@if ($errors->has('email')) <p class="help-block">{{ $errors->first('email') }}</p> @endif
				</div>
				<div class="form-group form-group @if ($errors->has('password')) has-error @endif">
					<label for="password">Password</label>
					<input class="form-control" placeholder="password" maxlength="10" type="password" name="password" id="password" value="{{ Request:: old('password')}}">
					@if ($errors->has('password')) <p class="help-block">{{ $errors->first('password') }}</p> @endif
					</div>
			   <button type="submit" class="btn btn-primary">Submit</button>
			    <input type="hidden" name="_token" value="{{ Session::token() }}">
			</form>   
		</div>	
@endsection		