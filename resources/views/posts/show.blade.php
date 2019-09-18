@extends('layouts.default')

@section('content')
    <h1> {{ $post->title }} </h1>
    <hr/>
    <div>
        <img src=" {{ asset('images/posts'.$post->photo) }} " class="img-responsive" />
    </div>
    <br>
    {!! $post->body !!}
    <br>
    
@if(!Auth::guest() && (Auth::user()->id == $post->user_id))
        <a style="margin-left:25%" href="/posts/{{ $post->slug}}/edit" class="btn btn-default"><i class='fas fa-edit'></i>Edit Post</a>
        
        <div class="float-right">

            {!! Form::open(['action'=> ['PostsController@destroy',  $post->id ], 'method'=>'POST']) !!}

                {{ Form::hidden('_method', 'DELETE') }}
                
                <button class="btn btn-danger" type="submit">Delete Post</button>
            {!! Form::close() !!}  
            </div>
@endif

    <hr/>
    
    <h4> Comments {{ $post->comments->count() }}</h4>
    <hr/>

        <div class="comments">
        @foreach($post->comments as $comment)
            <div class="comment">
                <div class="clearfix">
                    <h4 class="pull-keft"> {{ $comment->user->name }}</h4>
                    <p class="pull-right">{{ $comment->created_at->format('d M Y') }}</p>
                </div>
                <p>{{ $comment->body }}</p>
            </div>
            @endforeach
        </div>

    <div class="panel panel-default">
        <div class="panel-heading"></div>
        <div class="panel-body">
        @guest
                <div class="alert alert-info">You need to connect</div>
        @else
            
        <form action="{{ route('comments.store', $post->slug)}}" method="POST">
            {{ csrf_field() }}
            <div class="form-group">
                <label for="Comment">Comment</label>
                
                <textarea name="body" class="form-control" placeholder="Entre Your Comment" cols="30" rows="10"></textarea>
            </div>
            
            <div class="form-group text-right">
                <button style="submit" class="btn btn-primary">Add Comment</button>
            </div>
        </form>
        @endguest
        </div>
    </div>






@endsection