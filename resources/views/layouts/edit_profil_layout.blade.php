<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <style>
        input:focus,
        textarea:focus {
        border-color: #fde047 !important; /* yellow-400 dari Tailwind */
        outline: none;
    }
    </style>
</head>
<body class="bg-gray-100 text-yellow-300 font-sans">
    @yield('content')
</body>
</html>