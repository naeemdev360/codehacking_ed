@extends('layouts.admin')



@section('content')
    @if(Session::has('delete_user'))
        <div class="alert alert-danger">
            {{session('delete_user')}}
        </div>
        @endif
    <h1 class="display-1">Users</h1>
    <table class="table table-hover">
        <thead>
          <tr>
            <th>Id</th>
              <th>Photo</th>
            <th>Name</th>
            <th>Email</th>
              <th>Role</th>
              <th>is Active</th>
            <th>Created</th>
            <th>Updated</th>
          </tr>
        </thead>
        <tbody>
        @if(isset($users))
            @foreach($users as $user)
              <tr>
                <td>{{$user->id}}</td>
                  <td><img height="100" src="{{$user->photo ? $user->photo->file : "https://www.lansweeper.com/wp-content/uploads/2018/05/ASSET-USER-ADMIN.png"}}" alt="not fount"></td>
                <td><a href="{{route('admin.users.edit',$user->id)}}">{{$user->name}}</a></td>
                <td>{{$user->email}}</td>
                <td>{{$user->role->name}}</td>
                <td>{{$user->is_active==0?'inactive':'active'}}</td>
                <td>{{$user->created_at->diffForHumans()}}</td>
                <td>{{$user->updated_at->diffForHumans()}}</td>

              </tr>
             @endforeach
          @endif
        </tbody>
      </table>
@endsection