@extends('layouts.app')

@section('content')  
  <div class="jumbotron text-center">
      <h1>Welcome To Hallel</h1>
      <p class="lead">This is where everything Happens </p>
      <p>
          <a href="/login" class="btn btn-primary btn-lg">Login In</a>
          <a href="/register" class="btn btn-danger btn-lg">Register</a>
          <a href="/about" class="btn btn-secondary btn-lg">About Us</a>
      </p>
  </div>  

@endsection