@extends ('layouts.master')
@section('head')
    <script type="text/javascript" src="{{ URL::to('src/js/signIn.js') }}"></script>
    <link rel="stylesheet" href="{{ URL::to('src/css/sendPost.css') }}" />
@endsection
@section('content')

    @include('includes.message-block')
    <section class="row db-center-block">
        <div class="btn-group btn-group-lg" role="group" aria-label="...">
            <a type="button" class="btn btn-default btn-info disabled" href="{{ route('dashboard') }}"><span class="badge">1</span> Write Post</a>
            <a type="button" class="btn btn-default btn-primary disabled" href="{{ route('courseSelection') }}"><span class="badge">2</span> Choose Recepients</a>
            <a type="button" class="btn btn-default  btn-success enabled" href=href="{{ route('sendPost') }} ><span class="badge">3</span> Send Post</a>
        </div>
    </section>
    <div class="panel panel-default panel-primary">
        <div class="panel-heading">Confirm Message:</div>
        <div class="panel-body">
            <p>Your message will be sent to:</p>
            @if($role==1)
                @foreach($departments as $department)
                    <p>{{$department['name']}}</p>
                @endforeach
            @elseif($role==2)
                @foreach($st as $stName)
                    <p>{{ $stName }}</p>
                @endforeach
                <hr>
            @endif
            Your Message is: <p>{{$Post}}</p>
        </div>
        <a class="btn btn-primary " href={{ route('notification') }} role="button">Confirm</a>
    </div>
@endsection