@extends('layouts.master')

@section('title')
    Account
@endsection

@section('content')
      <section class= "row new-post">
	     <div class="col-md-6 col-md-offset-3">
		 <header><h3>Your Account </h3></header>
		    <form action ="{{ route('account.save') }}" method= "post" enctype = "multipart/form-data">
			   <div class="form-group">
			     <label for="user_name">User Name</label>
				 <input type="text" name="first_name" class="form-control" value="{{ $user->first_name}}" id="first_name">
			    </div>
				<div class="form-group">
					<label for="password">Password</label>
					<input type="password" name="password" class="form-control"  id="password">
				</div>
				<button type="submit" class="btn btn-primary">Save Account</button>
				<input type="hidden" value="{{ Session::token() }}" name="_token">
				</form>
			</div>
         </section>

				   
@endsection