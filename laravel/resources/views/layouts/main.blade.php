<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])

     
</head>
<body> 
    <div class="container">
        <div class="row">
            <nav class="navbar navbar-expand-lg bg-body-tertiary">
                <div class="container-fluid">
                  <a class="navbar-brand" href="{{ route('main.index') }}">Main</a>
                  <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Переключатель навигации">
                    <span class="navbar-toggler-icon"></span>
                  </button>
                  <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                      <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="{{ route('contact.index') }}">Contact</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" href="{{ route('about.index') }}">About</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" href="{{ route('post.index') }}">Post</a>
                      </li>
                    </ul>
                  </div>
                </div>
              </nav>
        </div>
    </div>
   @yield('content')
</body>
</html>