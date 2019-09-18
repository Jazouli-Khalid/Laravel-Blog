
@extends('layouts.default')

@section('content')
<br>
<h3>Add New Post </h3>
<hr/>

{!! Form::open(['action'=> 'PostsController@store', 'files' => 'true', 'enctype'=>'multipart/form-data', 'method'=>'POST']) !!}
<div class="from-group">
    {{ Form::text('title', '', [ 'placeholder'=>'Enter Post Title', 'class'=>'form-control' ]) }}
</div>
<br>
<div class="from-group">
    {{ Form::textarea('body', '', [ 'placeholder'=>'Enter Your Post ', 'class'=>'form-control ckeditor' ]) }}
</div>
<br>
<div class="from-group">
    {{ Form::file('photo', [ 'class'=>'form-control' ]) }}
</div>
<br>
<div class="from-group">
    {{ Form::label('Tags') }}
    <select class="js-example-placeholder-multiple js-states form-control tags" multiple="multiple">
        @foreach($tags as $tag)
            <option >{{ $tag->tag}}</option>
        @endforeach
    </select>

</div>
<br>
<div class="from-group">
    {{ Form::submit('save', ['class'=>'btn btn-primary']) }}
</div>

{!! Form::close() !!}

@endsection
@section('script')
<script type="text/javascript">
$(document).ready(function() {
    $('.tags').select2();
});
</script>
@endsection