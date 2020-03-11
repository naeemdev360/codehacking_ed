@extends('layouts.admin')

@section('content')
    <h1>Create Posts</h1>

     {!! Form::open(['method'=>'POST','action'=>'AdminPostsController@store','files'=>true]) !!}
        <div class="form-group">
            {!! Form::label('title','Title') !!}
            {!! Form::text('title',null,['class'=>'form-control','placeholder'=>'title']) !!}
        </div>
    <div class="form-group">
        {!! Form::label('category_id','Category') !!}
        {!! Form::select('category_id',[''=>'options']+$categories,null,['class'=>'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('user_id','Category') !!}
        {!! Form::select('user_id',[''=>'options']+$authors,null,['class'=>'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('photo_id','Photo') !!}
        {!! Form::file('photo_id',null,['class'=>'form-control','placeholder'=>'title']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('body','Body') !!}
        {!! Form::textarea('body',null,['class'=>'form-control','placeholder'=>'title']) !!}
    </div>
         <div class="form-group">

             {!! Form::submit('create',['class'=>'btn btn-primary']) !!}
         </div>
     {!! Form::close() !!}
    @include('includes.error_form')

@endsection