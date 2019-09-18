@extends('layouts.default')

@section('content')

    @foreach($posts as $post)
<br>
        <div class="panel">
            <div class="panel-heading">
                <a href="/posts/{{$post->slug}}">
                    <h3>{{ $post->name }}</h3>
                </a>
            </div>
            <div class="panel-body">
                {!! str_limit(strip_tags($post->details), 100)!!}
            </div>
        </div>
        <div class="panel-footer">
        <span class="label label-primary">
            <i class="fas fa-user"></i>{{ $post->user['name']}}
            </span>
&nbsp
            <span class="label label-primary">
            <i class="fas fa-calendar"></i>{!! $post->created_at !!}
            </span>
            
        </div>
    @endforeach
    {{ $posts->links() }}
    
@endsection