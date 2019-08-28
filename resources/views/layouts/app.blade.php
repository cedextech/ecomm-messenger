<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>@yield('title')</title>

        <link rel="icon" href="{{ asset('favicon.ico') }}" type="image/x-icon" />

        <!-- Tell the browser to be responsive to screen width -->
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Miriam+Libre:400,700|Source+Sans+Pro:200,400,700,600,400italic,700italic" rel="stylesheet">

        <!-- Font Awesome -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">

        <!-- Ionicons -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">

        <!-- Styles -->
        <link href="{{ mix('/css/app.css') }}" rel="stylesheet">

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->

        <script>
            window.Laravel = {!! json_encode([
                'csrfToken' => csrf_token(),
                'shop_id' => (Auth::guest()) ? '' : Auth::user()->shop->id,
                'pusherAppKey' => config('broadcasting.connections.pusher.key')
            ]) !!};

            var module = { };
        </script>

    </head>

    <body class="@yield('body-class', 'hold-transition skin-green sidebar-mini fixed')">

        @if (!Auth::guest())
            @include('shared.header')
            @include('shared.sidebar')
        @endif


        @if (isset($loginPage))
            @yield('content')
        @else
            <div class="content-wrapper">
                <div class="row">
                    <div class="col-md-12">
                        @include('flash::message')
                    </div>
                </div>

                @yield('content')
            </div>
        @endif

        <!-- Modal -->
        <div class="modal fade" id="custom-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document">

            </div>
        </div>

        <div id="order-beep" style="display:none;">{{ asset('notification.mp3') }}</div>

        <!-- Logout form -->
        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            {{ csrf_field() }}
        </form>

        <!-- Scripts -->
        <script src="{{ mix('/js/app.js') }}"></script>
    </body>
</html>
