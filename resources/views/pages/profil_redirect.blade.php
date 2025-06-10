<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Redirecting...</title>
</head>
<body>
    <script>
        // Ganti URL ini dengan route profil yang kamu pakai
        location.replace("{{ route('profil') }}");
    </script>
    <noscript>
        <meta http-equiv="refresh" content="0;url={{ route('profil') }}">
    </noscript>
</body>
</html>
