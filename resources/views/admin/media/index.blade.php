@extends('layouts.admin')

@section('content')
    <h1>Media</h1>
    @if($photos)
        <table class="table table-hover">
            <thead>
            <tr>
                <th>Id</th>
                <th>Name</th>
                <th>Created At</th>
                <th>Updated at</th>
            </tr>
            </thead>
            <tbody>
           @foreach($photos as $photo)
               <tr>
                   <td>{{$photo->id}}</td>
                   <td><img src="{{$photo->file}}" class="img-responsive img-rounded" width="100" alt=""></td>
                   <td>{{$photo->created_at->diffForHumans()}}</td>
                   <td>{{$photo->updated_at->diffForHumans()}}</td>

               </tr>
               @endforeach

            </tbody>
        </table>
    @endif
    @endsection