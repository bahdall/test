<!doctype html>
<html lang="{{ config('app.locale') }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" >
        <link href="{{ elixir('js/tsort/tsort.css') }}" rel="stylesheet">
        <link href="{{ elixir('css/app.css') }}" rel="stylesheet">
    </head>
    <body>
        <div class="container">
          @yield('content')
        </div>

        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <script src="{{ elixir('js/tsort/tsort.js') }}"></script>
        <script src="{{ elixir('js/app.js') }}"></script>
    </body>
</html>
