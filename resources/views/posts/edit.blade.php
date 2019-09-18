
@extends('layouts.default')

@section('content')
<br>
<h3>Edit {{ $post->title }} </h3>
<hr/>

{!! Form::open(['action'=> ['PostsController@update',$post->slug ], 'method'=>'POST']) !!}
    {{ Form::hidden('_method', 'PUT')}}
<div class="from-group">
    {{ Form::text('title',$post->title, [ 'placeholder'=>'Enter Post Title', 'class'=>'form-control' ]) }}
</div>
<br>
<div class="from-group">
    {{ Form::textarea('body',$post->body, [ 'placeholder'=>'Enter Post Descrition', 'class'=>'form-control ckeditor']) }}
</div>
<br>
<div class="from-group">
    {{ Form::submit('update', ['class'=>'btn btn-primary']) }}
</div>

{!! Form::close() !!}

@endsection