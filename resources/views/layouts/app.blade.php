<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Золотой мяч 2022')</title>
    <link href="{{ mix('css/app.css') }}" rel="stylesheet">
    <script src="{{ mix('js/app.js') }}"></script>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="{{ url('/') }}">
                Золотой мяч 2022
            </a>
            <div class="navbar-nav">
                <a class="nav-link" href="{{ route('players.index') }}">Футболисты</a>
                <a href="{{ route('trash.index') }}" class="btn btn-outline-warning">
                    <i class="bi bi-trash"></i> Корзина
                    @php
                        $trashCount = \App\Models\Player::onlyTrashed()->count();
                    @endphp
                    @if($trashCount > 0)
                        <span class="badge bg-danger">{{ $trashCount }}</span>
                    @endif
                </a>
            </div>
        </div>
    </nav>

    <main class="container my-4">
        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif

        @if($errors->any())
            <div class="alert alert-danger alert-dismissible fade show">
                <strong>Ошибки:</strong>
                <ul class="mb-0">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif

        @yield('content')
    </main>

    <footer class="bg-dark text-white py-3 mt-5">
        <div class="container text-left">
            <p class="mb-1">Черных Юрий Александрович</p>
        </div>  
    </footer>
</body>
</html>