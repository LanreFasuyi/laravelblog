@extends('layouts.app')

@section('content') 
<a href="/posts" class="btn btn-default">Go Back</a>
<h4>{{$post->title}}</h4>

<hr>
<div class="jumbotron">
    <img  src="/storage/cover_images/{{$post->cover_image}}" alt="" style="width:auto; height: 50%">
</div>
<small>
  {{$post->created_at}}
</small>
<div class="lead">{!! $post->body !!}</div>
<hr>



@if (!Auth::guest())
    
  @if (Auth::user()->id == $post->user_id )
      
  <a href="/posts/{{$post->id}}/edit"
    class="btn btn-default">Edit
  </a>
  {!! Form::open(['action' => ['postsController@update', $post->id], 'method' =>'POST', 'class' => 'float-right']) !!}
      {{Form::hidden('_method', 'DELETE')}}
      {{ Form::submit('Delete', ['class' => 'btn btn-danger'])}}

    {!! Form::close() !!}
  @endif
    
  @endif
@endsection