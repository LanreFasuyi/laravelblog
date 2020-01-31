<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{config('app.name', 'MY_APP')}}</title>

        <!-- Styles -->
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
        
    </head>
    <body>
      @include('inc.navbar')
      <div class="container">
        @include('inc.messages')
        @yield('content')
      </div>


      <script src="//cdn.ckeditor.com/4.13.1/standard/ckeditor.js"></script>
<script>
    CKEDITOR.replace( 'article-ckeditor' );
</script>
    </body>
</html>
