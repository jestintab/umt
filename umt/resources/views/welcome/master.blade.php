<!DOCTYPE html>
<html>
    <head>
        <title>@yield('title')</title>

       <!-- Latest compiled and minified CSS -->
       <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">

    </head>
    <body>
   
        <div class="container">
        @if (Auth::check())
    <a href="{{ url('auth/logout') }}"> Logout </a>
    
    @else
    <a href="{{ url('auth/login') }}"> Login </a>
    <a href="{{ url('auth/register') }}"> Register </a>

    @endif
            <div class="content">
                 @yield('content')

            </div>
        </div>
    </body>
</html>
