@extends ('layouts.master')
@section('head')
<script type="text/javascript" src="{{ URL::to('src/js/signIn.js') }}"></script>
@endsection
@section('content')

 @include('includes.message-block')
 @if (session('status'))
     <div class="alert alert-success">
         {{ session('status') }}
     </div>
 @endif
			<section class="row db-center-block">
		<div class="btn-group btn-group-lg" role="group" aria-label="...">
          <a type="button" class="btn btn-default btn-info" href="{{ route('dashboard') }}"><span class="badge">1</span> Write Post</a>
          <a type="button" class="btn btn-default btn-primary disabled" href="{{ route('courseSelection') }}"><span class="badge">2</span> Choose Recepients</a>
          <a type="button" class="btn btn-default  btn-success disabled" href=href="{{ route('sendPost') }} ><span class="badge">3</span> Send Post</a>
       </div>
       </section>
 {{--<div class="row">--}}
     {{--<div class="well col-md-4" style="max-height:300px; overflow: auto;margin-top: -10px;margin-left:-90px">--}}
            {{----}}
             {{--</div>--}}
 {{--</div>--}}
  <section class="row new-post">
       <div class="col-md-6 col-md-offset-3">
	    <header><h3> What would you like to say? </h3> </header>
		<form action="{{ route('post.create') }}" method="post">
		 <div class="form-group">
		    <textarea class="form-control" spellcheck="true" name="body" id="new-post" cols="30" rows="5" placeholder="Your post"></textarea>
		 </div>
		 <button type="submit" class="btn btn-primary" >Next</button>
		 <input type="hidden" value="{{ Session::token() }}" name="_token">
		</form>
	   </div> 	   
    </section>
	<section class="row">

	</section>

@endsection

