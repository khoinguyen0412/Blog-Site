<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>{{ config('app.name') }}</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

        <!-- Bootstrap -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

        <style>
            body {
                font-family: 'Nunito';
            }
        </style>

    </head>
    <header class="p-5 bg-dark">
        <div class="">
            @if (Route::has('login'))
                <div class="hidden fixed top-0 right-0 py-4 sm:block">
                    @auth
                        <p class ="text-right" style="color:white">Logged in as @ {{Auth::user()->name}}</p>
                        
                        <div class = "d-flex flex-row-reverse" style="gap:5px">
                            <a href="{{ route('logout') }}" class="btn btn-danger">Log out</a>
                            @if (Auth::user()->role_id == 1)
                            @php
                                $prefix = Request::route()->getPrefix();
                            @endphp
                                @if($prefix != '/admin')
                                    <a href = "{{route('admin.index')}}" class="btn btn-info">Admin Settings</a>
                                @else
                                <div class="dropdown">
                                        <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            Blog's Users
                                        </button>
                                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                            <a class="dropdown-item" href="{{route('admin.show')}}">View Posts By Users</a>
                                            <a class="dropdown-item" href="#">Another action</a>
                                            <a class="dropdown-item" href="#">Something else here</a>
                                        </div>
                                </div>
                                <a href = "{{route('home')}}" class ="btn btn-primary" style="position:absolute; left:20px">Back to Homepage</a>
                                @endif
                            @endif
                        </div>
                    @else
                        <div class = "text-right">
                            <a href="{{ route('login') }}" class="btn btn-outline-primary ">Log in</a>
                    @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="btn btn-outline-danger">Register</a>
                    @endif
                        </div>
   
                    @endauth
                </div>
            @endif
    </header>

    <body class = "antialiased">

    @yield('content')

    </body>


    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src=
    "https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js">
  </script>
    
    <script src=
    "https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js">
    </script>
</html>