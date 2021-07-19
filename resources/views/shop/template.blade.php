<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href=" {{asset('css/bootstrap.min.css')}} ">
    <title> @yield('title') </title>
</head>
<body>
  <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
    <a class="navbar-brand" href="#">Navbar</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarsExampleDefault">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item active">
          <a class="nav-link" href="{{ url('/') }}">Home <span class="sr-only">(atual)</span></a>
        </li>
        <li class="nav-item">
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="" id="dropdown01" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Categorias</a>
          <div class="dropdown-menu" aria-labelledby="dropdown01">
            <a class="dropdown-item" href="{{url('category.find','computers')}}">Computers</a>
            <a class="dropdown-item" href="{{url('category.find','tablets')}}">Tabletes</a>
            <a class="dropdown-item" href="{{url('category.find','smartphones')}}">Smartphones</a>
          </div>
        </li>
       
           @if (Route::has('login'))
                    @auth
                    <li class="nav-item">
                        <a href="{{ url('/home') }}" class="nav-link">Home</a>
                      </li>
                    @else
                    <li class="nav-item">
                        <a href="{{ route('login') }}" class="nav-link">Entrar</a>
                      </li>
                        @if (Route::has('register'))
                        <li class="nav-item">
                            <a href="{{ route('register') }}" class="nav-link">Criar conta</a>
                          </li>
                        @endif
                    @endauth
                
            @endif
        
      </ul>
      <form class="form-inline my-2 my-lg-0" action="{{url('search')}}">
        <input class="form-control mr-sm-2" type="text" name="search" placeholder="Pesquisa" aria-label="Search">
        <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Pesquisar</button>
      </form>
    </div>
  </nav>      
    <div class="container">
        @yield('content')
    </div>


    <script src="js/jquery.js"></script>
    <script src="js/popper.min.js "></script>
    <script src="js/bootstrap.min.js "></script>
</body>
</html>