<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
    <link rel="stylesheet" href="{{asset('css/blog.css')}}">
    <script src="{{asset('js/jquery.min.js')}}"></script>
    <script src="{{asset('js/popper.min.js')}}"></script>
    <script src="{{asset('js/bootstrap.min.js')}}"></script>
</head>
<body>   
    <nav class="navbar navbar-expand-sm bg-dark navbar-dark">
        <a class="navbar-brand" href="">Logo</a>
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navb">
          <span class="navbar-toggler-icon"></span>
        </button>
      
        <div class="collapse navbar-collapse" id="navb">
          <ul class="navbar-nav mr-auto">
            <li class="nav-item">
              <a class="nav-link" href="">Link</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="">Link</a>
            </li>
            <li class="nav-item">
              <a class="nav-link disabled" href="">Disabled</a>
            </li>
            <!-- Dropdown -->
    <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
          Categorias
        </a>
        <div class="dropdown-menu">
          @forelse (App\Model\Categories::orderBy('title')->get() as $i)
        <a class="dropdown-item" href="{{$i->id}}">{{$i->title}}</a>
              
          @empty
              
          @endforelse
        </div>
      </li>
          </ul>
          <form class="form-inline my-2 my-lg-0">
            <input class="form-control mr-sm-2" type="text" placeholder="Search">
            <button class="btn btn-success my-2 my-sm-0" type="button">Search</button>
          </form>
        </div>
      </nav>
<div class="container">
    @yield('content')
</div> 
</body>
</html>