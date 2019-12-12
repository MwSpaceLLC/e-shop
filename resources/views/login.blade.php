<!-- We Love Develop an idea from scratch
                        .__
  ____             _____|  |__   ____ ______
_/ __ \   ______  /  ___/  |  \ /  _ \\____ \
\  ___/  /_____/  \___ \|   Y  (  <_> )  |_> >
 \___  >         /____  >___|  /\____/|   __/
     \/               \/     \/       |__|
We made this e-commerce Laravel Plugin with Love ❤ -->
<!DOCTYPE html>
<html lang="{{app()->getLocale()}}">
<head>
    <title>e-shop Login</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">
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
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{asset('/vendor/eshop/auth/css/bootstrap.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('/vendor/eshop/auth/css/fontawesome-all.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('/vendor/eshop/auth/css/iofrm-style.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('/vendor/eshop/auth/css/iofrm-theme15.css')}}">

    <div id="fb-root"></div>
    <script async defer crossorigin="anonymous"
            src="https://connect.facebook.net/it_IT/sdk.js#xfbml=1&version=v5.0&appId=263631600984157&autoLogAppEvents=1"></script>
</head>
<body>
<div class="form-body">
    <div class="website-logo">
        <div class="eshop mb-9">
            <img class="logo-size" src="{{asset('/vendor/eshop/assets/favicon/apple-icon-180x180.png')}}" alt="eshop"
                 width="50">
        </div>
    </div>
    <div class="row">
        <div class="img-holder">
            <div class="bg"></div>
            <div class="info-holder">
                <h3>Welcome to e-shop platform</h3>
                <p>accelerate your business by developing an e-commerce platform in a simple, fast and dynamic
                    way.<br><br>
                    We are working to make things even easier. Thanks to our work, in a few minutes you can set up an
                    online shop with your favorite front-end and the most used framework in the world!</p>
            </div>
        </div>
        <div class="form-holder">
            <div class="form-content">
                <div class="form-items">
                    <div class="page-links">
                        <a class="active">Login</a>
                        @error('email')
                        <a style="pointer-events: none" class="text-danger">{{ $message }}</a>
                        @enderror
                        @if($message = Session::get('success'))
                            <a style="pointer-events: none" class="text-success">{{ $message }}</a>
                        @endif
                    </div>
                    <form method="post" action="{{route('eshop-post-login')}}"> @csrf
                        <input value="{{old('email')}}" class="form-control invalid" type="email" name="email"
                               placeholder="E-mail Address"
                               required>
                        <div class="form-button">
                            <button id="submit" type="submit" class="ibtn">Send Token</button>
                        </div>
                    </form>
                    <div class="other-links">
                        <span>Share Please! 🙊 </span>
                        <div class="fb-share-button" data-href="https://github.com/MwSpaceLLC/eshop"
                             data-layout="button" data-size="small">
                            <a target="_blank"
                               href="https://www.facebook.com/sharer/sharer.php?u=https%3A%2F%2Fgithub.com%2FMwSpaceLLC%2Feshop&amp;src=sdkpreparse"
                               class="fb-xfbml-parse-ignore">Condividi</a></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
<script src="{{asset('/vendor/eshop/auth/js/jquery.min.js')}}"></script>
<script src="{{asset('/vendor/eshop/auth/js/popper.min.js')}}"></script>
<script src="{{asset('/vendor/eshop/auth/js/bootstrap.min.js')}}"></script>
<script src="{{asset('/vendor/eshop/auth/js/main.js')}}"></script>
</html>
