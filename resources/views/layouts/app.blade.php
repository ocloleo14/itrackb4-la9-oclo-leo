<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>@yield('title')</title>

    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css"
        rel="stylesheet">
</head>

<body>

    <header class="bg-dark text-white py-4 mb-4">
        <div class="container">
            <h1>My Book Collection</h1>
            <p class="mb-0">Created by: Rosalio Oclo</p>
        </div>
    </header>

    @include('partials._nav')

    <main class="container">
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        @yield('content')
    </main>

</body>
</html>