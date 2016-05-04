<?php
/**
 * Created by PhpStorm.
 * User: Farah
 * Date: 3/27/2016
 * Time: 9:25 PM
 */
@extends ('layouts.master')
@include('includes.header')
@section('content')

    {!! Form::open(array('route' => 'queries.search’, 'class'=>'form navbar-form navbar-right searchform')) !!}
    {!! Form::text('search', null,
                           array('required',
                                'class'=>'form-control',
                                'placeholder'=>'Search for a tutorial...')) !!}
    {!! Form::submit('Search',
                               array('class'=>'btn btn-default')) !!}
    {!! Form::close() !!}


@endsection