
<!DOCTYPE html>

<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title') | {{ env('APP_NAME') }}</title>

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


<body data-spy="scroll" data-target=".rui-page-sidebar" data-offset="140" class="rui-no-transition rui-navbar-autohide rui-section-lines">
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
    @auth
            @include('layouts.sidebar')
            @include('layouts.topbar')
        @endauth

        <div class="rui-page content-wrap">
        <div class="rui-main">
            <main>
                {!! unload_messages() !!}
                @yield('content')
            </main>
        </div>
        @include('studio.setup')
        @auth
        @include('layouts.footer')
    @endauth
</div>
</div>
<script src="{{ asset('assets/js/vendor.js') }}"></script>
<script src="{{ asset('assets/js/rootui.js') }}"></script>
<script src="{{ asset('assets/js/rootui-init.js') }}"></script>
<script src="https://maps.googleapis.com/maps/api/js?key={{ env("GOOGLE_MAPS_KEY") }}&libraries=places&callback=initAutocomplete" async defer></script>
<script src="{{ asset('assets/js/custom.js') }}"></script>
@yield('js')
@if(session('showSetupModal') === true)
<script>
    $(document).ready(function(){
        $(".modal").modal('show');
    });
</script>
@endif
</body>
</html>


