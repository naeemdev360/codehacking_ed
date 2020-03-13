@extends('layouts.admin')

@section('content')
    <h1>Edit Posts</h1>

    <div class="row">
        <div class="col-sm-3">
            <img src="{{$post->photo->file}}" class="img-rounded img-responsive" alt="">
        </div>
        <div class="col-sm-9">
            {!! Form::model($post,['method'=>'PATCH','action'=>['AdminPostsController@update',$post->id],'files'=>true]) !!}
            <div class="form-group">
                {!! Form::label('title','Title') !!}
                {!! Form::text('title',null,['class'=>'form-control','placeholder'=>'title']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('category_id','Category') !!}
                {!! Form::select('category_id',[''=>'options']+$categories,null,['class'=>'form-control']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('user_id','User') !!}
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

                {!! Form::submit('Update Post',['class'=>'btn btn-primary col-sm-6']) !!}
            </div>
            {!! Form::close() !!}
            {!! Form::open(['method'=>'DELETE','action'=>['AdminPostsController@destroy',$post->id]]) !!}
            {!! Form::submit('Delete',['class'=>'btn btn-danger col-sm-6']) !!}
            {!! Form::close() !!}
        </div>
    </div>
    @include('includes.error_form')

@endsection