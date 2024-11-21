<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.10.5/font/bootstrap-icons.min.css"
        rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Jost:ital,wght@0,100..900;1,100..900&display=swap"
        rel="stylesheet">
    <style>
        body {
            background-color: #1B2421;
            font-family: "Jost", sans-serif;
            color: #FBFADA;
            height: 100vh;
        }

        h1, h2, h3, h4, h5, h6, p{
            margin: 0;
        }

        .layanan{
            background-color: #2A332E; 
            border: 1px solid; 
            border-color: #FBFADA; 
            color: #FBFADA;
            margin-right: 5px;
        }

        .fasilitas{
            background-color: #2A332E; 
            border: 1px solid; 
            border-color: #FBFADA; 
            color: #FBFADA;
            margin-right: 5px;
        }

        .laporan th {
            background-color: #2A332E;
            color: #FBFADA;
        }
        .pagination a {
            color: #2A332E !important;
            background-color: #FBFADA !important;
            border: none;
            border-radius: 5px;
            padding: 5px 10px;
            margin: 0 2px;
            text-decoration: none;
        }
        .pagination a.active {
            background-color: #2A332E !important;
            color: #FBFADA !important;
        }

    </style>
</head>

<body class="container-fluid p-2">
    <div class="rounded py-3 px-4 d-flex justify-content-between align-items-center" style="background-color: #2A332E; height: 10vh">
        <div class="d-flex flex-row align-items-center gap-2">
            <img src="{{ asset('image/logo.svg') }}" alt="logo" style="width: 15px; height: 15px;">
            <span style="font-size: 15px;">Al-Ukhuwwah</span>
        </div>
        <span style="font-size: 15px;">Bandung | 08:02</span>
    </div>
    @yield('content')

    <div class="rounded mt-1 p-1" style="background-color: #2A332E; height: 5vh">
        <div class="col text-center">
            <span>Copyright © Al-Ukhuwwah 2024</span>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
