<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>@yield('title') - Perpus Prestasi Prima</title>

    <link rel="icon" type="image/png" href="https://smk.prestasiprima.sch.id/assets/images/logo-smk.png">

    <style>
        html,
        body {
            margin: 0;
            padding: 0;
            height: 100%;
            background-color: #1a1a1a;
            color: #ffffff;
            font-family: Arial, sans-serif;
        }

        .main-wrapper {
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }

        .content-container {
            flex: 1;
            padding: 30px;
            box-sizing: border-box;
            width: 100%;
        }
    </style>
</head>

<body>

    <div class="main-wrapper">
        @include('layouts.navbar')

        <main class="content-container">
            @yield('content')
        </main>

        @include('layouts.footer')
    </div>

</body>

</html>
