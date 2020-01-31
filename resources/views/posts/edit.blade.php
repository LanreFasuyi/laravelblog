@extends('layouts.app')

@section('content')  
  <div class="row">
    <h1>Edit Post</h1>
    <div class="col-8 col-md-auto ">
      {!! Form::open(['action' => ['postsController@update', $post->id ], 'method'=>'POST']) !!}
      
        <div class="form-group">
          {{Form::label('title', 'Title' )}}
          {{Form::text('title', $post->title, ['class'=>'form-control', 'placeholder'=>'title'])}}
        </div>
    
        <div class="form-group">
          {{Form::label('body', 'Body' )}}
          {{Form::textarea('body', $post->body, ['id'=>'article-ckeditor','class'=>'form-control', 'placeholder'=>'Body Text'])}}
        </div>
    
        {{Form::hidden('_method', 'PUT')}}
        {{Form::submit('Suubmit', ['class'=>'btn btn-primary'])}}
      {!! Form::close() !!}
    </div>
  </div>
  


@endsection