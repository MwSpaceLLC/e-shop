<!-- We Love Develop an idea from scratch
                        .__
  ____             _____|  |__   ____ ______
_/ __ \   ______  /  ___/  |  \ /  _ \\____ \
\  ___/  /_____/  \___ \|   Y  (  <_> )  |_> >
 \___  >         /____  >___|  /\____/|   __/
     \/               \/     \/       |__|
We made this e-commerce Laravel Plugin with Love ❤ | ux (envato / quixlab) -->
<!DOCTYPE html>
<html lang="{{app()->getLocale()}}">
<head>
    <title>Backend Login | e-shop</title>
    <meta charset="utf-8">
    <link rel="dns-prefetch" href="//cdn.jsdelivr.net/">
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
    <link rel="stylesheet" href="{{asset('vendor/eshop/assets/css/tradix.css')}}">
    <link rel="stylesheet" href="{{asset('vendor/eshop/assets/css/custom.css')}}">

    <!-- Script -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"
            integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"
            integrity="sha256-x3YZWtRjM8bJqf48dFAv/qmgL68SI4jqNWeSLMZaMGA=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.4.1/js/bootstrap.min.js"
            integrity="sha256-WqU1JavFxSAMcLP2WIOI+GB2zWmShMI82mTpLDcqFUg=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-nice-select/1.1.0/js/jquery.nice-select.min.js"
            integrity="sha256-Zr3vByTlMGQhvMfgkQ5BtWRSKBGa2QlspKYJnkjZTmo=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/node-waves/0.7.6/waves.min.js"
            integrity="sha256-R//ABCk0LbG1/TvQQ4+sbwjzmPxJn9SF5f7FJ2AwJ4o=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.4/toastr.min.js"
            integrity="sha256-yNbKY1y6h2rbVcQtf0b8lq4a+xpktyFc3pSYoGAY1qQ=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-circle-progress/1.2.2/circle-progress.min.js"
            integrity="sha256-2XpjfLL5tRYLa3AAM0gz6aAY0zxvHogDzTWemxkTPDg=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/apexcharts/3.8.6/apexcharts.min.js"
            integrity="sha256-fPasH9WrBndkSzQggD2jDhtCOJ8MapJPWFDUjLGPNPM=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tippy.js/3.4.1/tippy.min.js"
            integrity="sha256-40Df9zwhwAOyOM6Lp2plp+Czdy2PlVxTuY07maOlXeY=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/node-snackbar@0.1.16/dist/snackbar.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js"
            integrity="sha256-Kg2zTcFO9LXOc7IwcBx1YeUBJmekycsnTsq2RuFHSZU=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tinymce/5.1.2/tinymce.min.js"
            integrity="sha256-DdWABQXQvgw5MFqHCMQ34eo2D3GTcL6xA36LVz1sAmQ=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tinymce/5.1.2/themes/silver/theme.min.js"
            integrity="sha256-R6tqgNv9sxVru+r49uhkXZlReXzULd9bomlZEnxv75Q=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/sortablejs@latest/Sortable.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.19.1/axios.min.js"
            integrity="sha256-Hhwv1ElzvrH6ZuiIDWEO6xBYW3lmFYrapwcjgXhpL6g=" crossorigin="anonymous"></script>

    <script defer src="{{asset('vendor/eshop/assets/js/custom.js')}}"></script>
    <script defer src="{{asset('vendor/eshop/assets/js/global.js')}}"></script>

</head>
<body class="login">

<div id="preloader">
    <div class="sk-three-bounce">
        <div class="sk-child sk-bounce1"></div>
        <div class="sk-child sk-bounce2"></div>
        <div class="sk-child sk-bounce3"></div>
    </div>
</div>

<div class="container">
    <div class="row justify-content-center align-items-center">
        <div class="col-xl-5 col-md-6 auth">
            <div class="auth-form card">
                <div class="card-header justify-content-center">
                    <h4 class="card-title"><img src="{{asset('/vendor/eshop/assets/img/e-shop--LOGO.png')}}" width="150"
                                                alt=""></h4>
                </div>
                <div class="card-body">
                    <form method="post" action="{{route('eshop-post-login')}}">
                        @csrf
                        <div class="form-group mb-4">
                            <label>Indirizzo Email</label>
                            <input type="email" name="email" class="form-control"
                                   placeholder="" required value="{{old('email')}}">
                        </div>
                        <button class="btn-success btn-block btn-lg border-0" type="submit">Auth Token</button>
                    </form>
                    <div class="new-account text-center mt-3">
                        <iframe
                            src="https://www.facebook.com/plugins/share_button.php?href=https%3A%2F%2Fgithub.com%2FMwSpaceLLC%2Fe-shop&layout=button_count&size=large&width=111&height=28&appId"
                            width="111" height="28" style="border:none;overflow:hidden" scrolling="no" frameborder="0"
                            allowTransparency="true" allow="encrypted-media"></iframe>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@include('eshop::backend.components.errors')
</body>
</html>
