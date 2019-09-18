@extends('layouts.default')

@section('content')
<div class="container">
    <div class="row ">
        <div class="col-md-8 col-md-offser-Z">
            <div class="panel panel-default">
                <div class="panel-heading">L0L
                    <div  class="btn-group pull-right" class="float:right">
                            <a href="posts/create" class="btn.btn-default.btn-sm">
                                <i class="fas fa-plus"></i> New Post
                            </a>
                    </div>
                </div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success" >
                            {{ session('status') }}
                        </div>
                    @endif
                <h3>Your Posts</h3>
                

                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Title</th>
                            <th>Created</th>
                            <th>Edit</th>
                            <th>Delete</th>
                        
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($posts as $post)
                        <tr>
                            <td>{{ $post->title}}</td>
                            <td>{{ $post->created_at}}</td>
                            <td>
                                <a href="/posts/{{ $post->slug}}/edit" class="btn btn-info btn-sm"><i class='fas fa-edit'></i>Edit Post</a>
                            </td>
                            <td>
                                {!! Form::open(['action'=> ['PostsController@destroy',  $post->id ], 'method'=>'POST']) !!}
                                {{ Form::hidden('_method', 'DELETE') }}
                                <button class="btn btn-danger btn-sm" type="submit">Delete Post</button>
                                {!! Form::close() !!}  
                            </td>
                        </tr>
                    </tbody>
                    @endforeach
                
                </table>
                
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
