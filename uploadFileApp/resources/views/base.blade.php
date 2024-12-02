<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <title>@yield('title', 'Upload File App')</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <header>
        <h1>@yield('titulo', 'Files uploader')</h1>
    </header>
    <div>
        @if(session('message'))
            <div>
                {{ session('message') }}
            </div>
        @endif

        @if($errors->any())
            <div>
                {{ $errors->first() }}
            </div>
        @endif

        @yield('content')
    </div>
</body>
</html>