@extends ('layouts.master')
@section("head")
    <link rel="stylesheet" href="{{ URL::to('src/css/courseSelection.css') }}" />
    <script type="text/javascript" src="{{ URL::to('src/js/depSelection.js') }}"></script>
@endsection
@section('content')
    <div class="row">
        <div class="col-md-4 col-md-offset-4 error" id="courseError">
            Please choose one faculty atleast:
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
        <div class="db-center-block">
            <h3 class="text-center">Departments:</h3>
            <div class="well" style="max-height:300px; overflow: auto;">
                <form id='collegeForm' >
                    @foreach ($departments as $department)
                        <div class="row course-box">
                            <label> <input type="checkbox" name="{{ $department->dep_name }}" value="{{$department->dep_id}}">{{ $department->dep_name }}</label>
                        </div>
                    @endforeach
                </form>
            </div>
            <button class="btn btn-primary col-xs-12" id="get-checked-data">next</button>
        </div>
    </section>
@endsection