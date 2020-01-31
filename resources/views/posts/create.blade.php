@extends('layouts.app')

@section('content')  
  <div class="row">
    <div class="">
        <h1>Create Post</h1>

      {!! Form::open(['action' => 'postsController@store', 'method'=>'POST']) !!}
      
        <div class="form-group">
          {{Form::label('title', 'Title' )}}
          {{Form::text('title', '', ['class'=>'form-control', 'placeholder'=>'title'])}}
        </div>
    
        <div class="form-group">
          {{Form::label('body', 'Body' )}}
          {{Form::textarea('body', '', ['id'=>'article-ckeditor','class'=>'form-control', 'placeholder'=>'Body Text'])}}
        </div>
    
        {{Form::submit('Suubmit', ['class'=>'btn btn-primary'])}}
      {!! Form::close() !!}
    </div>
  </div>
  


@endsection