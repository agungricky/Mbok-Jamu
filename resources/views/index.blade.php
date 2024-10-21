<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Resume - Start Bootstrap Theme</title>
    <link rel="icon" type="image/x-icon" href="assets/img/favicon.ico" />
    <!-- Font Awesome icons (free version)-->
    <script src="{{ url('https://use.fontawesome.com/releases/v6.3.0/js/all.js') }}" crossorigin="anonymous"></script>
    <!-- Google fonts-->
    <link href="{{ url('https://fonts.googleapis.com/css?family=Saira+Extra+Condensed:500,700') }}" rel="stylesheet"
        type="text/css" />
    <link href="{{ url('https://fonts.googleapis.com/css?family=Muli:400,400i,800,800i') }}" rel="stylesheet"
        type="text/css" />
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="{{ asset('css/styles.css') }}" rel="stylesheet" />
    <script src="https://www.gstatic.com/firebasejs/9.16.0/firebase-app.js"></script>
    <script src="https://www.gstatic.com/firebasejs/9.16.0/firebase-database.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>

<body id="page-top">
    @include('nav')

    @yield('content')

    <!-- Bootstrap core JS-->
    <script src="{{ asset('https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js') }}"></script>
    <!-- Core theme JS-->
    <script src="{{ asset('js/scripts.js') }}"></script>
</body>

</html>
