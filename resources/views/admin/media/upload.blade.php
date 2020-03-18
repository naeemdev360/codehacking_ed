@extends('layouts.admin')

@section('styles')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.7.0/min/dropzone.min.css">
    @endsection

@section('content')
    <h2>Upload Media</h2>

     {!! Form::open(['method' => 'POST','action'=>'AdminMediasController@store','class'=>'dropzone']) !!}

         {!! Form::close() !!}
    @endsection




@section('script')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.7.0/min/dropzone.min.js"></script>
    @endsection