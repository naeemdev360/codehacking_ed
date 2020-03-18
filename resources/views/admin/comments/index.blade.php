@extends('layouts.admin')

@section('content')
    <h3>Comments</h3>
    @if(count($comments)>0)
        <table class="table table-hover">
            <thead>
            <tr>
                <th>Id</th>
                <th>Body</th>
                <th>view post</th>
                <th>view replies</th>
                <th>Author</th>
                <th>Author Photo</th>
                <th>Email</th>

                <th>Created AT</th>
                <th>Updated AT</th>
                <th>is active</th>
            </tr>
            </thead>
            <tbody>
            @foreach($comments as $comment)
                <tr>
                    <td>{{$comment->id}}</td>
                    <td>{{$comment->body}}</td>
                    <td><a target="_blank" href="{{route('home.post',$comment->post->id)}}">View Post</a></td>
                    <td><a href="{{route('admin.comment.replies.show',$comment->id)}}">View Replies</a></td>
                    <td>{{$comment->author}}</td>
                    <td><img src="{{$comment->photo?$comment->photo->file:"not found"}}" width="100" alt=""></td>
                    <td>{{$comment->email}}</td>

                    <td>{{$comment->created_at->diffForHumans()}}</td>
                    <td>{{$comment->updated_at->diffForHumans()}}</td>
                    <td>
                        @if($comment->is_active==0)
                             {!! Form::open(['method' => 'PATCH','action'=>['PostCommentsController@update',$comment->id]]) !!}
                            <input type="hidden" name="is_active" value="1">
                                 <div class="form-group">

                                     {!! Form::submit('Approve',['class'=>'btn btn-success']) !!}
                                 </div>
                                 {!! Form::close() !!}
                            @else
                            {!! Form::open(['method' => 'PATCH','action'=>['PostCommentsController@update',$comment->id]]) !!}
                            <input type="hidden" name="is_active" value="0">
                            <div class="form-group">

                                {!! Form::submit('Upapprove',['class'=>'btn btn-primary']) !!}
                            </div>
                            {!! Form::close() !!}
                            @endif
                    </td>
                    <td>
                        {!! Form::open(['method' => 'DELETE','action'=>['PostCommentsController@destroy',$comment->id]]) !!}

                        <div class="form-group">

                            {!! Form::submit('Delete',['class'=>'btn btn-danger']) !!}
                        </div>
                        {!! Form::close() !!}
                    </td>
                </tr>
                @endforeach

        </table>
        @endif

    @endsection