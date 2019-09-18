    @extends('layouts.default')
    @section('content')
<br>
<h3>Contact Us</h3>
<hr/>
{!! Form::open(['action'=> 'PagesController@tosend', 'method'=>'POST']) !!}
    <div class="from-group">
        {{ Form::label('Name')}}
        {{ Form::text('name', '', [ 'placeholder'=>'Enter Your Name', 'class'=>'form-control' ]) }}
    </div>
    <br>
    <div class="from-group">
        {{ Form::label('Email')}}
        {{ Form::text('email', '', [ 'placeholder'=>'Enter Your Email', 'class'=>'form-control' ]) }}    </div>
    <br>
    <div class="from-group">
        {{ Form::label('Your Message')}}
        {{ Form::textarea('subject', '', [ 'placeholder'=>'Enter Your Message', 'class'=>'form-control' ]) }}
    </div>
    <br>


    {{ Form::submit('Send Message', ['class'=>'btn btn-primary']) }}

    {!! Form::close() !!}

    <!-- <div class="form-group pull-right">
        <button class="btn btn-info">
                Send <span class="badge badge-primary"></span>
        </button>
    </div> -->

    





@endsection