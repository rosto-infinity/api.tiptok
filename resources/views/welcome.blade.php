<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Tiptok API</title>
    
    @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    @endif
    
    <!-- Utilisation de main.css si disponible -->
    <link rel="stylesheet" href="{{ asset('css/main.css') }}">
    
  
</head>
<body>
    { <br>
        Hello World ! <br>
        Welcome to Tiptok API <br>   
    }
</body>
</html>