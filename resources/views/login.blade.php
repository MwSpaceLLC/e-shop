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
    <link rel="dns-prefetch" href="//connect.facebook.net">
    <link rel="dns-prefetch" href="//fonts.googleapis.com">
    <link rel="dns-prefetch" href="//cdnjs.cloudflare.com">
    <link rel="dns-prefetch" href="//{{request()->getHost()}}">
    <meta charset="utf-8">
    <title>e-shop Login</title>
    <meta name="theme-color" content="#ffffff">
    <meta name="robots" content="noindex, nofollow">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="msapplication-TileImage" content="{{asset('/vendor/eshop/assets/favicon/ms-icon-144x144.png')}}">
    <script async defer crossorigin="anonymous"
            src="https://connect.facebook.net/it_IT/sdk.js#xfbml=1&version=v5.0&appId=263631600984157&autoLogAppEvents=1"></script>
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

    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900&display=swap"
          rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.4.1/css/bootstrap.min.css"
          integrity="sha256-L/W5Wfqfa0sdBNIKN9cG6QA5F2qx4qICmU2VgLruv9Y=" crossorigin="anonymous"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.min.css"
          integrity="sha256-+N4/V/SbAFiW1MPBCXnfnP9QSN3+Keu+NlB+0ev/YKQ=" crossorigin="anonymous"/>
    <link rel="stylesheet" type="text/css" href="{{asset('/vendor/eshop/assets/css/iofrm-style.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('/vendor/eshop/assets/css/iofrm-theme15.css')}}">

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"
            integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"
            integrity="sha256-x3YZWtRjM8bJqf48dFAv/qmgL68SI4jqNWeSLMZaMGA=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.4.1/js/bootstrap.min.js"
            integrity="sha256-WqU1JavFxSAMcLP2WIOI+GB2zWmShMI82mTpLDcqFUg=" crossorigin="anonymous"></script>
    <script src="{{asset('/vendor/eshop/assets/js/auth.main.js')}}"></script>
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
                        @if($message = session()->get('success'))
                            <a style="pointer-events: none" class="text-success">{{ $message }}</a>
                        @endif
                    </div>
                    <form id="login" method="post" action="{{route('eshop-post-login')}}" onsubmit="preventLogin()"> @csrf
                        <input value="{{old('email')}}" class="form-control invalid" type="email" name="email"
                               placeholder="E-mail Address"
                               required>
                        <div class="form-button">
                            <button id="submit" type="submit" class="ibtn">
                                Send Token
                            </button>
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
<div id="fb-root"></div>
</body>
</html>
