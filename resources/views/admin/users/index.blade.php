@extends('layouts.admin')



@section('content')
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
                  <td><img height="100" src="{{$user->photo ? $user->photo->file:"not fount"}}" alt="not fount"></td>
                <td>{{$user->name}}</td>
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