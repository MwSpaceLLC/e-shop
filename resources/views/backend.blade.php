<!-- We Love Develop an idea from scratch
                        .__
  ____             _____|  |__   ____ ______
_/ __ \   ______  /  ___/  |  \ /  _ \\____ \
\  ___/  /_____/  \___ \|   Y  (  <_> )  |_> >
 \___  >         /____  >___|  /\____/|   __/
     \/               \/     \/       |__|
We made this e-commerce Laravel Plugin with Love ❤ | ux (envato / stacks) -->
<!DOCTYPE html>
<html lang="{{app()->getLocale()}}">
<head>
    <title>@yield('title') | e-shop</title>
    <meta charset="utf-8">
    <link rel="dns-prefetch" href="//oss.maxcdn.com">
    <link rel="dns-prefetch" href="//cdnjs.cloudflare.com">
    <link rel="dns-prefetch" href="//{{request()->getHost()}}">

    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="{{ asset('/vendor/eshop/assets/favicon/app.ico') }}">
    <link rel="apple-touch-icon" sizes="57x57" href="{{asset('/vendor/eshop/assets/favicon/apple-icon-57x57.png')}}">
    <link rel="apple-touch-icon" sizes="60x60" href="{{asset('/vendor/eshop/assets/favicon/apple-icon-60x60.png')}}">
    <link rel="apple-touch-icon" sizes="72x72" href="{{asset('/vendor/eshop/assets/favicon/apple-icon-72x72.png')}}">
    <link rel="apple-touch-icon" sizes="76x76" href="{{asset('/vendor/eshop/assets/favicon/apple-icon-76x76.png')}}">
    <link rel="apple-touch-icon" sizes="114x114"
          href="{{asset('/vendor/eshop/assets/favicon/apple-icon-114x114.png')}}">
    <link rel="apple-touch-icon" sizes="120x120"
          href="{{asset('/vendor/eshop/assets/favicon/apple-icon-120x120.png')}}">
    <link rel="apple-touch-icon" sizes="144x144"
          href="{{asset('/vendor/eshop/assets/favicon/apple-icon-144x144.png')}}">
    <link rel="apple-touch-icon" sizes="152x152"
          href="{{asset('/vendor/eshop/assets/favicon/apple-icon-152x152.png')}}">
    <link rel="apple-touch-icon" sizes="180x180"
          href="{{asset('/vendor/eshop/assets/favicon/apple-icon-180x180.png')}}">
    <link rel="icon" type="image/png" sizes="192x192"
          href="{{asset('/vendor/eshop/assets/favicon/android-icon-192x192.png')}}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{asset('/vendor/eshop/assets/favicon/favicon-32x32.png')}}">
    <link rel="icon" type="image/png" sizes="96x96" href="{{asset('/vendor/eshop/assets/favicon/favicon-96x96.png')}}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{asset('/vendor/eshop/assets/favicon/favicon-16x16.png')}}">
    <link rel="manifest" href="{{asset('/vendor/eshop/assets/favicon/manifest.json')}}">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="{{asset('/vendor/eshop/assets/favicon/ms-icon-144x144.png')}}">
    <meta name="theme-color" content="#ffffff">
    <meta name="robots" content="noindex, nofollow">

    <!-- Styles -->
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900&display=swap"
          rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.4.1/css/bootstrap.min.css"
          integrity="sha256-L/W5Wfqfa0sdBNIKN9cG6QA5F2qx4qICmU2VgLruv9Y=" crossorigin="anonymous"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.min.css"
          integrity="sha256-+N4/V/SbAFiW1MPBCXnfnP9QSN3+Keu+NlB+0ev/YKQ=" crossorigin="anonymous"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.12/css/select2.css"
          integrity="sha256-kalgQ55Pfy9YBkT+4yYYd5N8Iobe+iWeBuzP7LjVO0o=" crossorigin="anonymous"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tippy.js/3.4.1/tippy.css"
          integrity="sha256-ZTyFbdqVmPjY60OWBt0VRtcu76LR9LfdDvkxcnCYjuE=" crossorigin="anonymous"/>

    <link href="{{asset('vendor/eshop/assets/css/lime.min.css')}}" rel="stylesheet">
    <link href="{{asset('vendor/eshop/assets/css/custom.css')}}" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    <!-- Script -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"
            integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"
            integrity="sha256-x3YZWtRjM8bJqf48dFAv/qmgL68SI4jqNWeSLMZaMGA=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.4.1/js/bootstrap.min.js"
            integrity="sha256-WqU1JavFxSAMcLP2WIOI+GB2zWmShMI82mTpLDcqFUg=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jQuery-slimScroll/1.3.8/jquery.slimscroll.min.js"
            integrity="sha256-qE/6vdSYzQu9lgosKxhFplETvWvqAAlmAuR+yPh/0SI=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.js"
            integrity="sha256-R4pqcOYV8lt7snxMQO/HSbVCFRPMdrhAFMH+vr9giYI=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/apexcharts/3.8.6/apexcharts.min.js"
            integrity="sha256-fPasH9WrBndkSzQggD2jDhtCOJ8MapJPWFDUjLGPNPM=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Sortable/1.10.1/Sortable.min.js"
            integrity="sha256-9D6DlNlpDfh0C8buQ6NXxrOdLo/wqFUwEB1s70obwfE=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.19.0/axios.min.js"
            integrity="sha256-S1J4GVHHDMiirir9qsXWc8ZWw74PHHafpsHp5PXtjTs=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tinymce/5.1.2/tinymce.min.js"
            integrity="sha256-DdWABQXQvgw5MFqHCMQ34eo2D3GTcL6xA36LVz1sAmQ=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js"
            integrity="sha256-Kg2zTcFO9LXOc7IwcBx1YeUBJmekycsnTsq2RuFHSZU=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.12/js/select2.min.js"
            integrity="sha256-wfVTTtJ2oeqlexBsfa3MmUoB77wDNRPqT1Q1WA2MMn4=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tippy.js/3.4.1/tippy.min.js"
            integrity="sha256-40Df9zwhwAOyOM6Lp2plp+Czdy2PlVxTuY07maOlXeY=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/elevatezoom/3.0.8/jquery.elevatezoom.min.js"
            integrity="sha256-qKR4XxSeNRotDGhz15nIC0JfCha6nLlF9M8GDm7rmx4=" crossorigin="anonymous"></script>

    <script src="{{asset('vendor/eshop/assets/js/lime.min.js')}}"></script>
    <script defer src="{{asset('vendor/eshop/assets/js/custom.js')}}"></script>

    @yield('css')
</head>

<body class="e-shop">

@include('eshop::part.sidebar')

@include('eshop::part.modules')

@include('eshop::part.header')

@yield('content')

@include('eshop::part.alert')

@yield('js')

</body>
</html>
