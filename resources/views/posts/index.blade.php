@extends('layouts.app')

@section('content')  
<div class="card card-body">
  <h1 class="">Posts</h1>
  
  @if(count($posts) > 0)
    @foreach ($posts as $post)
      <div class="row">
          
              <div class="col-md-4 col-sm-4">
                  <a href="/posts/{{$post->id}}">
              <img  src="/storage/cover_images/{{$post->cover_image}}" alt="" style="width:auto; height:80px"></a>
              </div>
              <div class="col-md-8 col-sm-8">
                  <h4><a href="/posts/{{$post->id}}">{{$post->title}}</a></h4>
<p>Created at {{$post->created_at}} <span class="ml-4"> written by: {{$post->user->name}}</span></p>
                </div>
          
      </div>
    
    @endforeach
    {{$posts->links()}}

    @else
    <p>No Posts Found</p>
  @endif

</div>
  


@endsection