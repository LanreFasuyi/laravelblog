@extends('layouts.app')

@section('content')  
<div class="card card-body">
  <h1 class="">Posts</h1>
  
  @if(count($posts) > 0)
    @foreach ($posts as $post)
<h4><a href="/posts/{{$post->id}}">{{$post->title}}</a></h4>
<p>Created at {{$post->created_at}} <span class="ml-4"> written by: {{$post->user->name}}</span></p>
    @endforeach
    {{$posts->links()}}

    @else
    <p>No Posts Found</p>
  @endif

</div>
  


@endsection