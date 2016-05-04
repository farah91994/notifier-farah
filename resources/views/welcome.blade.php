@extends('layouts.master')

@section('title')
	Welcome!
@endsection

@section('content')

	<body style="background-image: url({{ URL::asset('img/2.jpg') }});  -webkit-background-size: cover">
	<div class="row-home" >
		{{--<div class="header-text hidden-xs">--}}
			{{--<div class="col-md-12 text-center">--}}
				{{--<h1>--}}
					{{--<span>Notifier</span>--}}
				{{--</h1>--}}
				{{--<br>--}}
				{{--<h2>--}}
					{{--<span>Reach students where they are.</span>--}}
				{{--</h2>--}}
				{{--<br>--}}
				{{--<a class="btn btn-primary btn-lg" href="{{ route('signUp') }}" role="button">Sign Up</a>--}}
				{{--<a class="btn btn-primary btn-lg" href="{{ route('signIn') }}" role="button">Log in</a>--}}
			{{--</div>--}}
		{{--</div>--}}
		<div class="center-block Box-signin" style="background-color: rgba(255, 255, 255, 0.9);margin-left:60%;padding: 30px 80px 30px 30px;width: 480px;
    height: auto;">

            <img src="http://localhost/laravel2/public/img/Not.png" style="    clear: left;  float: left;  margin-left: 5px;  margin-right: 50px;">
			<form action="{{ route('signin')}}" method="post">
				<div class="form-group @if ($errors->has('email')) has-error @endif">
					<label for="email" style="margin-top: 60px;margin-left: -260px;">Email</label>
					<input class="form-control" maxlength="30" placeholder="email" type="text" name="email" id="email" value="{{ Request:: old('email')}}">
					@if ($errors->has('email')) <p class="help-block">{{ $errors->first('email') }}</p> @endif
				</div>
				<div class="form-group form-group @if ($errors->has('password')) has-error @endif">
					<label for="password">Password</label>
					<input class="form-control" placeholder="password" maxlength="10" type="password" name="password" id="password" value="{{ Request:: old('password')}}">
					@if ($errors->has('password')) <p class="help-block">{{ $errors->first('password') }}</p> @endif
				</div>
				<button type="submit" class="btn btn-primary">Submit</button>
                <a class="btn btn-primary" href="{{ route('signUp') }}" role="button">Sign Up</a>
				<input type="hidden" name="_token" value="{{ Session::token() }}">
			</form>
		</div>

	</div>
	</body>
@endsection