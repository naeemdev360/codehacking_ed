@extends('layouts.admin')

@section('content')
    <h1>Categories</h1>
    @if(Session::has('delete_post'))
        <div class="alert alert-danger">
            {{session('delete_post')}}
        </div>
    @endif
   <div class="row">
       <div class="col-sm-6">
               {!! Form::open(['method' => 'POST','action'=>'AdminCategoriesController@store']) !!}
               <div class="form-group">
                   {!! Form::label('name','Category') !!}
                   {!! Form::text('name',null,['class'=>'form-control','placeholder'=>'Name']) !!}
               </div>
               <div class="form-group">

                   {!! Form::submit('create',['class'=>'btn btn-success btn-block']) !!}
               </div>
               {!! Form::close() !!}
           @if(isset($category))
               {!! Form::model($category,['method' => 'PATCH','action'=>['AdminCategoriesController@update',$category->id]]) !!}
               <div class="form-group">
                   {!! Form::label('name','Edit Category') !!}
                   {!! Form::text('name',null,['class'=>'form-control','placeholder'=>'Name']) !!}
               </div>
               <div class="form-group">

                   {!! Form::submit('Update',['class'=>'btn btn-success btn-block']) !!}
               </div>
               {!! Form::close() !!}
           @endif
       </div>



       <div class="col-sm-6">
           @if(count($categories)>0)
               <table class="table table-hover">
                   <thead>
                   <tr>
                       <th>Id</th>
                       <th>Name</th>
                       <th>Created At</th>
                       <th>Updated At</th>
                       <th>Edit</th>
                   </tr>
                   </thead>
                   <tbody>
                   @foreach($categories as $category)
                       <tr>
                           <td>{{$category->id}}</td>
                           <td>{{$category->name}}</td>

                           <td>{{$category->created_at->diffForHumans()}}</td>
                           <td>{{$category->updated_at->diffForHumans()}}</td>
                           <td><a href="{{route('admin.categories.edit',$category->id)}}">Edit</a></td>

                       </tr>
                   @endforeach
                   </tbody>
               </table>
           @endif
       </div>

   </div>
@endsection