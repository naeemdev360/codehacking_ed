@extends('layouts.admin')

@section('content')
    <h1>Posts</h1>
    @if(Session::has('delete_post'))
        <div class="alert alert-danger">
            {{session('delete_post')}}
        </div>
        @endif
    @if(count($posts)>0)
        <table class="table table-hover">
            <thead>
              <tr>
                <th>Id</th>
                <th>User</th>
                <th>Category</th>
                <th>Photo</th>
                <th>Title</th>
                <th>Body</th>
                <th>Create at</th>
                <th>Updated at</th>
              </tr>
            </thead>
            <tbody>
            @foreach($posts as $post)
              <tr>
                <td>{{$post->id}}</td>
                <td>{{$post->user ?$post->user->name : "Unknown"}}</td>
                <td>{{$post->category?$post->category->name:'uncategories'}}</td>
                <td><img src="{{$post->photo->file}}" height="100" class=" img-rounded" alt=""></td>
                <td><a href="{{route('admin.posts.edit',$post->id)}}">{{$post->title}}</a></td>
                <td>{{$post->body}}</td>
                <td>{{$post->created_at->diffForHumans()}}</td>
                <td>{{$post->updated_at->diffForHumans()}}</td>
                  <td><a href="{{route('home.post',$post->id)}}">View Post</a></td>
                  <td><a href="{{route('admin.comments.show',$post->id)}}">View Comments</a></td>

              </tr>

            @endforeach
            </tbody>
          </table>
        <div class="row">
            <div class="col-sm-6 col-sm-offset-6">
                {{$posts->render()}} {{-- for pagination --}}
            </div>
        </div>

    @endif
@endsection