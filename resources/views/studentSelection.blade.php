@extends ('layouts.master')
@section("head")
		<link rel="stylesheet" href="{{ URL::to('src/css/courseSelection.css') }}" />
		<script type="text/javascript" src="{{ URL::to('src/js/studentSelection.js') }}"></script>
@endsection
@section('content')
	 <div class="row">
	   <div class="col-md-4 col-md-offset-4 error" id="courseError">
	 	  <p>Please choose one student at least:</p>
	   </div>
	   </div>
    <section class="row new-post">
		<section class="row db-center-block">
	     <div class="btn-group btn-group-lg" role="group" aria-label="...">
          <a type="button" class="btn btn-default btn-info disabled" href="{{ route('dashboard') }}"><span class="badge">1</span> Write Post</a>
          <a type="button" class="btn btn-default btn-primary" href="{{ route('courseSelection') }}"><span class="badge">2</span> Choose Recepients</a>
          <a type="button" class="btn btn-default  btn-success disabled" href=# ><span class="badge">3</span> Send Post</a>
        </div>
     </section>
		<h3 class="text-center">Students:</h3>
	<div class="db-center-block">
            <div class="well" style="max-height:300px; overflow: auto;margin-top: -30px">
				 <form id='selectionForm' name="students_selection_form">
					 @foreach($data as $courseName=>$Students)
                         <p class="course_name">{{$courseName}}</p>
						@foreach($Students as $student)
						 <div class="row course-box student-box">
							<label> <input type="checkbox" name="student_ids[]"  class="students"  value="{{$student['st_id']}}" > {{$student['st_names']}}</label>
						 </div>
						 @endforeach
					 @endforeach
				 </form>
      	    </div>
        <button class="btn btn-primary col-xs-12" id="get-checked-data">Select</button>
      </div>
    </section>
@endsection