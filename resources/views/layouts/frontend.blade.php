
<!DOCTYPE html>

<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@section('title') | {{ env('APP_NAME') }}</title>

    <meta name="description" content="RootUI - clean and powerful solution for your Dashboards, Administration areas.">
    <meta name="keywords" content="admin, dashboard, template, react, reactjs, html, jquery, clean">
    <meta name="author" content="nK">

    <link rel="icon" type="image/png" href="{{ asset('assets/images/favicon.png') }}">

    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- START: Styles -->

    <!-- Google Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito+Sans:300,400%7cOpen+Sans:300,400,600%7cPT+Serif:400i">

    <!-- Vendor -->
    <link rel="stylesheet" href="{{ asset('assets/css/vendor.css') }}">

    <!-- Bootstrap Custom -->
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap-custom.css') }}">

    <!-- RootUI -->
    <link rel="stylesheet" href="{{ asset('assets/css/rootui.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/rootui-night.css') }}" media="(night)" class="rui-nightmode-link">

    <!-- Custom Styles -->
    <link rel="stylesheet" href="{{ asset('assets/css/custom.css') }}">

    <!-- END: Styles -->
    <script src="https://js.stripe.com/v3/"></script>

</head>


<body>
    <div class="rui-page-preloader" role="status">
    <div class="rui-page-preloader-inner">
        <div></div>
        <div></div>
        <div></div>
        <div></div>
        <div></div>
        <div></div>
        <div></div>
        <div></div>
        <div></div>
        <div></div>
    </div>
</div>


    <div class="rui-main">
    <main class="py-4">
            @yield('content')
        </main>

    </div>



    <!-- START: Scripts -->

<!-- Vendor -->
<script src="{{ asset('assets/js/vendor.js') }}"></script>

<!-- RootUI -->
<script src="{{ asset('assets/js/rootui.js') }}"></script>
<script src="{{ asset('assets/js/rootui-init.js') }}"></script>
<!-- END: Scripts -->

@yield('js')

</body>
</html>
