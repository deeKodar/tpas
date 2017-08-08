<!DOCTYPE html>
<html lang="en">

    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

        <!-- Meta, title, CSS, favicons, etc. -->
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>TPAS | Teacher Projection System</title>
@include('includes/css')

    </head>

    <body class="nav-md">
        <div class="container body">
            <div class="main_container">
                
  @if(session()->has('message.level'))
    <div class="alert alert-{{ session('message.level') }} alert-dismissable fade in"> 
         <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
    {!! session('message.content') !!}
    </div>
@endif

                @include('includes/sidebar')

                @include('includes/topbar')

                @yield('main_container')

                @include('includes/footer')

            </div>
        </div>

      @include('includes/scripts')

    </body>
</html>