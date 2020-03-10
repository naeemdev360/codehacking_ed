@extends('layouts.admin')



@section('content')
    <h1 class="display-1">Edit User</h1>
    <div class="row">
        <div class="col-sm-3">
            <img src="{{$user->photo ? $user->photo->file : "https://www.lansweeper.com/wp-content/uploads/2018/05/ASSET-USER-ADMIN.png"}}" class="img-responsive img-rounded" alt="">
        </div>
        <div class="col-sm-9">
            {!! Form::model($user,['method'=>'PATCH','action'=>['AdminUsersController@update',$user->id],'files'=>true]) !!}
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
                {!! Form::select('is_active',[1=>"active",0=>'not active'],null,['class'=>'form-control']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('password','Password') !!}
                {!! Form::password('password',['class'=>'form-control']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('photo_id','Photo') !!}
                {!! Form::file('photo_id',null,['class'=>'form-control']) !!}
            </div>
            <div class="form-group">

                {!! Form::submit('Edit',['class'=>'btn btn-primary']) !!}
            </div>
            {!! Form::close() !!}
        </div>
    </div>

   <div class="row">
       @if(count($errors)>0)

           @foreach($errors->all() as $error)
               <div class="alert alert-danger">{{$error}}</div>
           @endforeach

       @endif
   </div>

@endsection