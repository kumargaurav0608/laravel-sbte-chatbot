<!-- <!DOCTYPE html>
<html>
<head>
    <title>Admin Panel</title>
</head>
<body>
    <nav>
        <a href="{{ route('admin.categories.index') }}">Categories</a> |
        <a href="{{ route('admin.questions.index') }}">Questions</a> |
        <a href="{{ route('admin.answers.index') }}">Answers</a>
    </nav>
    <hr>
    <div>
        @yield('content')
    </div>
</body>
</html>
 -->


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>@yield('title', 'My App')</title>

    <!-- CSS files -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet" />
    <link href="{{ asset('css/custom.css') }}" rel="stylesheet" />
    <!-- Add other CSS files here -->

    @stack('styles') {{-- for extra styles from child views --}}

    <!-- bootstrap import -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">



</head>
<body>

    <header>
        <!-- Navbar -->
        <nav class="navbar bg-light">
        <div class="justify-content-center align-center text-center p-2 my-2 flex flex-row mx-auto ">
                <a href="{{ route('admin.categories.index') }}" class="btn btn-secondary">Categories</a> 
                <a href="{{ route('admin.questions.index') }}" class="btn btn-secondary">Questions</a> 
                <a href="{{ route('admin.answers.index') }}" class="btn btn-secondary">Answers</a>
        </div>
        </nav>
    </header>

    <main>
        @yield('content') {{-- This is where child views inject their content --}}
    </main>

    <footer>
        {{-- Your footer --}}
    </footer>

    <!-- JS files -->
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="{{ asset('js/custom.js') }}"></script>
    <!-- Add other JS files here -->

    @stack('scripts') {{-- for extra scripts from child views --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>

</body>
</html>
