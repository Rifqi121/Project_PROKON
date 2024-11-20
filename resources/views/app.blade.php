<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.10.5/font/bootstrap-icons.min.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Jost:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <style>
        body {
            background-color: #1B2421;
            font-family: "Jost", sans-serif;
            color: #FBFADA;
        }

        h1,
        h2,
        h3,
        h4,
        h5,
        h6 {
            margin-bottom: 0;
        }

    </style>
</head>

<body>
    <div class="mt-3 mx-3 p-3" style="background-color: #2A332E;">
        <div class="d-flex justify-content-between align-items-center">
            <div class="d-flex flex-row align-items-center gap-2">
                <img src="{{ asset('image/logo.svg') }}" alt="logo">
                <h6>Yayasan Al-Ukhuwwah</h6>
            </div>
            <span>Bandung | 08:02</span>
        </div>
    </div>
    @yield('content')

    <div class="mt-1 mx-3 p-3" style="background-color: #2A332E;">
        <div class="col text-center">
            <span>Copyright © Al-Ukhuwwah 2024</span>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
