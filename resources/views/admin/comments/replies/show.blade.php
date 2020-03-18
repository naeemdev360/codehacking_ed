@extends('layouts.admin')

@section('content')
    <h3>replies</h3>
    @if(count($replies)>0)
        <table class="table table-hover">
            <thead>
            <tr>
                <th>Id</th>
                <th>Body</th>
                <th>Post ID</th>
                <th>Author</th>
                <th>Author Photo</th>
                <th>Email</th>

                <th>Created AT</th>
                <th>Updated AT</th>
                <th>is active</th>
            </tr>
            </thead>
            <tbody>
            @foreach($replies as $reply)
                <tr>
                    <td>{{$reply->id}}</td>
                    <td>{{$reply->body}}</td>
                    <td><a href="{{route('home.post',$reply->comment->post_id)}}">{{$reply->comment->post_id}}</a></td>
                    <td>{{$reply->author}}</td>
                    <td><img src="{{$reply->photo?$reply->photo->file:"not found"}}" width="100" alt=""></td>
                    <td>{{$reply->email}}</td>

                    <td>{{$reply->created_at->diffForHumans()}}</td>
                    <td>{{$reply->updated_at->diffForHumans()}}</td>
                    <td>
                        @if($reply->is_active==0)
                            {!! Form::open(['method' => 'PATCH','action'=>['CommentRepliesController@update',$reply->id]]) !!}
                            <input type="hidden" name="is_active" value="1">
                            <div class="form-group">

                                {!! Form::submit('Approve',['class'=>'btn btn-success']) !!}
                            </div>
                            {!! Form::close() !!}
                        @else
                            {!! Form::open(['method' => 'PATCH','action'=>['CommentRepliesController@update',$reply->id]]) !!}
                            <input type="hidden" name="is_active" value="0">
                            <div class="form-group">

                                {!! Form::submit('Upapprove',['class'=>'btn btn-primary']) !!}
                            </div>
                            {!! Form::close() !!}
                        @endif
                    </td>
                    <td>
                        {!! Form::open(['method' => 'DELETE','action'=>['CommentRepliesController@destroy',$reply->id]]) !!}

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