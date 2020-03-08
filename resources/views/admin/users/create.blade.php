@extends('layouts.admin')



@section('content')
    <h1 class="display-1">Create</h1>
    {!! Form::open(['method'=>'POST','action'=>'AdminUsersController@store','file'=>true]) !!}
       <div class="form-group">
           {!! Form::label('name','Name') !!}
           {!! Form::text('name',null,['class'=>'form-control']) !!}
       </div>
    <div class="form-group">
        {!! Form::label('email','Email') !!}
        {!! Form::email('email',null,['class'=>'form-control','placeholder'=>'Name']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('role_id','Role') !!}
        {!! Form::select('role_id',[''=>'Choose Options']+$roles,null,['class'=>'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('is_active','Status') !!}
        {!! Form::select('is_active',[1=>"active",0=>'not active'],0,['class'=>'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('password','Password') !!}
        {!! Form::password('password',['class'=>'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('file','Photo') !!}
        {!! Form::file('user_photo',null,['class'=>'form-control']) !!}
    </div>
    <div class="form-group">

        {!! Form::submit('create',['class'=>'btn btn-primary']) !!}
    </div>
    {!! Form::close() !!}
{{var_dump($roles)}}
    @if(count($errors)>0)

        @foreach($errors->all() as $error)
            <div class="alert alert-danger">{{$error}}</div>
        @endforeach

    @endif

@endsection