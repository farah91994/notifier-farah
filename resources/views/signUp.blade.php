@extends('layouts.master')
@include('includes.header3')

@section('title')
    SignUp
@endsection

@section('content')
    <div class="signup center-block Box-signin" style="background-color: rgba(245,245,245,0.9);margin-top: 40px">
        <h3>Sign Up </h3>
        <form class="form-group" action="{{ route('signup')}}" method="post">
            <div class="form-group @if ($errors->has('email')) has-error @endif">
                <label for="email">Email</label>
                <input class="form-control" placeholder="email" type="text" maxlength="20" name="email" id="email" value="{{ Request:: old('email')}}">
                @if ($errors->has('email')) <p class="help-block">{{ $errors->first('email') }}</p> @endif
            </div>
            <div class="form-group form-group @if ($errors->has('first_name')) has-error @endif">
                <label for="first_name">User Name</label>
                <input class="form-control" placeholder="user name" type="text" maxlength="10" name="first_name" id="first_name" value="{{ Request:: old('first_name')}}">
                @if ($errors->has('first_name')) <p class="help-block">{{ $errors->first('first_name') }}</p> @endif
            </div>
            <div class="form-group form-group">
                <label for="user_role">Role</label>

            <select name="role" class="form-group form-control form-group">
                @foreach($Roles as $aRole)
                <option value="{{$aRole['id']}}">{{$aRole['name']}}</option>
                    @endforeach
            </select>
            </div>
            <div class="form-group form-group @if ($errors->has('password')) has-error @endif">
                <label for="password">Password</label>
                <input class="form-control" placeholder="password" type="password"  maxlength="12" name="password" id="password" value="{{ Request:: old('password')}}">
                @if ($errors->has('password')) <p class="help-block">{{ $errors->first('password') }}</p> @endif
            </div>
            <button type="submit"  class="btn btn-primary btn-block">Submit</button>
            <input type="hidden" name="_token" value="{{ Session::token() }}">
        </form>
    </div>
@endsection