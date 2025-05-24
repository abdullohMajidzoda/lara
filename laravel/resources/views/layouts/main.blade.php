<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    <title>Animal</title>
</head>
<body>
    <div class="container">
      <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid">
          <a class="navbar-brand" href="{{ url('/') }}">Navbar</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0" >
                         
              <li class="nav-item">
                <a class="nav-link" href="{{ url('/' . session('city.slug')) }}">Home</a>
              </li>        
              <li class="nav-item">
                <a class="nav-link" href="{{ url(session('city.slug') . '/news') }}">News</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="{{ route('reset') }}">Delete The City</a>
              </li>
         
            </ul>
           <p class="btn btn-danger">{{ session('city.title') ?? 'Select City' }}</p> 
          </div>
        </div>
      </nav>
      @yield('content')
    </div>
</body>
</html>
