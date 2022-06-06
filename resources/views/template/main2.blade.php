<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">

    <title>@yield('title')</title>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ asset('annual/assets/bootstrap/bootstrap4-alpha3.min.css') }}">

    <style>
        body {
            background-color: #fafafa;
            font-size: 16px;
            line-height: 1.5;
        }

        h1,
        h2,
        h3,
        h4,
        h5,
        h6 {
            font-weight: 400;
        }

        #header {
            border-bottom: 5px solid #37474F;
            color: #37474F;
            margin-bottom: 1.5rem;
            padding: 1rem 0;
        }

        #revenue-tag {
            font-weight: inherit !important;
            border-radius: 0px !important;
        }

        .card {
            border: 0rem;
            border-radius: 0rem;
        }

        .card-header {
            background-color: #37474F;
            border-radius: 0 !important;
            color: white;
            margin-bottom: 0;
            padding: 1rem;
        }

        .card-block {
            border: 1px solid #cccccc;
        }

        .shadow {
            box-shadow: 0 6px 10px 0 rgba(0, 0, 0, 0.14),
                0 1px 18px 0 rgba(0, 0, 0, 0.12),
                0 3px 5px -1px rgba(0, 0, 0, 0.2);
        }

        #revenue-column-chart,
        #products-revenue-pie-chart,
        #orders-spline-chart {
            height: 300px;
            width: 100%;
        }
    </style>

    <!-- Scripts -->
    <script src="{{ asset('annual/assets/jquery/jquery-3.1.0.min.js') }}"></script>
    <script src="{{ asset('annual/assets/tether/tether.min.js') }}"></script>
    <script src="{{ asset('annual/assets/bootstrap/bootstrap4-alpha3.min.js') }}"></script>
    <script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>

    @yield('otherScript')

</head>

<body>

    @yield('content')

    @yield('otherScript2')

</body>

</html>