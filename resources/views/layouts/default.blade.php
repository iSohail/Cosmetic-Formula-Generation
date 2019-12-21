<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href={{asset('web/assets/mobirise-icons-bold/mobirise-icons-bold.css')}}>
    <link rel="stylesheet" href={{asset('web/assets/mobirise-icons/mobirise-icons.css')}}>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href={{asset('socicon/css/styles.css')}}>
    <link rel="stylesheet" href={{asset('css/style.css')}}>
    <link rel="stylesheet" href={{asset('css/main.css')}}>
    <link rel="stylesheet" href={{asset('mobirise/css/mbr-additional.css')}} type="text/css">

</head>

<body>
    @include('components.navbar')

    @yield('content')

    @include('components.footer')


    <script src="https://cdnjs.cloudflare.com/ajax/libs/jarallax/1.11.0/jarallax.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.touchswipe/1.6.19/jquery.touchSwipe.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mb.YTPlayer/3.2.10/jquery.mb.YTPlayer.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery.mb.vimeo_player@1.1.8/dist/jquery.mb.vimeo_player.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap-carousel-swipe-haven@0.0.7/carousel-swipe.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/smooth-scroll/16.1.0/smooth-scroll.js"></script>
    <script src="{{asset('js/main.js')}}"></script>
    <script src="{{asset('viewportchecker/jquery.viewportchecker.js')}}"></script>
    <script src="{{asset('mbr-switch-arrow/mbr-switch-arrow.js')}}"></script>


</html>