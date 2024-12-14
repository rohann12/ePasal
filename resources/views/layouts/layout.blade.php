<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>@yield('title')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>ePasal-@yield('title')</title>
    <script src="{{ asset('tailwind.jsx') }}"></script>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200;400;700&display=swap" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
 
</head>

<body>
    @include('layouts.navbar')
    <main>
        @yield('content')
        <!-- This is where the page-specific content will go -->
    </main>
    </div>

</body>

</html>