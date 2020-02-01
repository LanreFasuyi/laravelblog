@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="card card-default">
                <div class="card-heading">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    You are logged in!
                    <a href="/posts/create" class="btn btn-primary">Create Post</a>
                    <h1>Your Posts</h1>
                    @if (count($posts) > 0)
                    <table class="table table-striped">
                            <tr>
                                <th>Title</th>
                                <th></th>
                                <th></th>
                            </tr>
                            @foreach ($posts as $post)
                                <tr>
                                    <td><a href="/posts/{{$post->id}}">{{$post->title}}</a></td>
                                <td><a href="/posts/{{$post->id}}/edit" class="btn btn-default">Edit</a></td>
                                <td>
                                                                    
                                    {!! Form::open(['action' => ['postsController@update', $post->id], 'method' =>'POST', 'class' => 'float-right']) !!}
                                    {{Form::hidden('_method', 'DELETE')}}
                                    {{ Form::submit('Delete', ['class' => 'btn btn-danger'])}}

                                    {!! Form::close() !!}

                                </td>
                                </tr>
                            @endforeach
                        </table>
                        @else 
                            <p>You Have no posts</p>
                    @endif
                    
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
