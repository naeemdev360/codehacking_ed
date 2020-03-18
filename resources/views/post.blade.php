@extends('layouts.blog-post')

@section('content')

    <!-- Title -->
    <h1>{{$post->title}}</h1>

    <!-- Author -->
    <p class="lead">
        by <a href="#">{{$post->user ? $post->user->name:"Unknown"}}</a>
    </p>

    <hr>

    <!-- Date/Time -->
    <p><span class="glyphicon glyphicon-time"></span> Posted on {{$post->created_at}}</p>

    <hr>

    <!-- Preview Image -->
    <img class="img-responsive" src="{{$post->photo->file}}" alt="">

    <hr>

    <!-- Post Content -->
    <p class="lead">{{$post->body}} atibus, est!</p>

    <hr>

    <!-- Blog Comments -->

    <!-- Comments Form -->
    <div class="well">
        <h4>Leave a Comment:</h4>
         {!! Form::open(['method' => 'POST','action'=>"PostCommentsController@store"]) !!}
        <input type="hidden" name="post_id" value="{{$post->id}}">
        <input type="hidden" name="author" value="{{$post->user->name}}">
        <input type="hidden" name="photo_id" value="{{$post->user->photo_id}}">
        <input type="hidden" name="email" value="{{$post->user->email}}">
                <div class="form-group">
                    {!! Form::label('body','Body') !!}
                    {!! Form::textarea('body',null,['class'=>'form-control','placeholder'=>'body','rows'=>3]) !!}
                </div>
             <div class="form-group">

                 {!! Form::submit('Submit Comment',['class'=>'btn btn-primary']) !!}
             </div>
             {!! Form::close() !!}
    </div>

    <hr>

    <!-- Posted Comments -->

    <!-- Comment -->
   @if(count($comments)>0)
       @foreach($comments as $comment)
           @if($comment->is_active==1)
               <div class="media">
                   <a class="pull-left" href="#">
                       <img class="media-object" src="{{$comment->photo?$comment->photo->file:"https://img.icons8.com/bubbles/2x/admin-settings-male.png"}}" height="64" alt="">
                   </a>
                   <div class="media-body">
                       <h4 class="media-heading">{{$comment->author}}
                           <small>{{$comment->created_at->diffForHumans()}}</small>
                       </h4>
                       <p>{{$comment->body}}</p>

                           @if(count($comment->replies)>0)


                               @foreach($comment->replies as $reply)
                                  @if($reply->is_active==1)
                                   <div class="media">
                                       <a class="pull-left" href="#">
                                           <img class="media-object" src="{{$reply->photo->file}}" height="64" alt="">
                                       </a>
                                       <div class="media-body">
                                           <h4 class="media-heading">{{$reply->author}}
                                               <small>{{$reply->created_at->diffForHumans()}}</small>
                                           </h4>
                                           <p>{{$reply->body}}</p>
                                       </div>
                                      @endif

                                       @endforeach
                                       @endif
                                            <div class="toggle-form-container">
                                           <button class="toggle-reply btn btn-primary pull-right">Reply</button>

                                            <div class="reply-form">
                                                {!! Form::open(['method' => 'POST','action'=>'CommentRepliesController@createReply']) !!}
                                                <input type="hidden" name="comment_id" value="{{$comment->id}}">
                                                <input type="hidden" name="author" value="{{$post->user->name}}">
                                                <input type="hidden" name="photo_id" value="{{$post->user->photo_id}}">
                                                <input type="hidden" name="email" value="{{$post->user->email}}">
                                                <div class="form-group">
                                                    {!! Form::label('body','body') !!}
                                                    {!! Form::text('body',null,['class'=>'form-control','placeholder'=>'body']) !!}
                                                </div>
                                                <div class="form-group">

                                                    {!! Form::submit('create',['class'=>'btn btn-primary']) !!}
                                                </div>
                                                {!! Form::close() !!}
                                            </div>

                                            </div>
                                   </div>

                   </div>
               </div>

               @endif
           @endforeach
       @endif


    <!-- Comment -->
    {{--<div class="media">--}}
        {{--<a class="pull-left" href="#">--}}
            {{--<img class="media-object" src="http://placehold.it/64x64" alt="">--}}
        {{--</a>--}}
        {{--<div class="media-body">--}}
            {{--<h4 class="media-heading">Start Bootstrap--}}
                {{--<small>August 25, 2014 at 9:30 PM</small>--}}
            {{--</h4>--}}
            {{--Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin commodo. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.--}}
            {{--<!-- Nested Comment -->--}}

            {{--<!-- End Nested Comment -->--}}
        {{--</div>--}}
    {{--</div>--}}
    @endsection

@section('category')
    @if(count($categories)>0)
        <ul>
            @foreach($categories as $category)
                <li><a href="#">{{$category->name}}</a></li>
                @endforeach
        </ul>
    @endif
    @endsection



@section('scripts')
    <script>
        $('.toggle-reply').click(function () {
            $(this).next().slideToggle('slow');

        });
    </script>
    @endsection