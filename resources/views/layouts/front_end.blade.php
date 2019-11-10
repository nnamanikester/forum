<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>@yield('title') - Forum</title>
    <meta name="keywords" content="Forum">
    <meta name="description" content="Forum">
    <meta name="author" content="Forum">
    <link rel="shortcut icon" href="favicon/favicon.ico">
    <meta name="format-detection" content="telephone=no">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="{{asset('css/libs.css')}}">

    @yield('styles')

</head>
<body>

<!-- tt-mobile menu -->
@include('inc.nav')


{{--HEADER STARTS--}}
@yield('header')
{{--HEADER ENDS--}}


{{--MAIN BODY CONTENT--}}
<main id="tt-pageContent" class="tt-offset-small">
    <div class="container">

        @yield('content')

    </div>
</main>

{{--SETTINGS STARTS HERE--}}

{{--@if(Auth::check())--}}

    @include('inc.settings')

{{--@endif--}}

{{--SETTINGS ENDS HERE--}}






{{--THE USER CREATE TOPIC ICON--}}
<a href="{{route('user.create_topic')}}" class="tt-btn-create-topic">
    <span class="tt-icon">
        <svg>
          <use xlink:href="#icon-create_new"></use>
        </svg>
    </span>
</a>
{{--THE USER CREATE TOPIC ICON ENDS HERE--}}




{{--THE AADVANCED SEARCH STARTS HERE--}}
@include('inc.advanced_search')
{{--THE AADVANCED SEARCH ENDS HERE--}}


<script src="{{asset('js/libs.js')}}"></script>
<script src="{{asset('js/app.js')}}"></script>
<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
@yield('scripts')



{{--SVG ICONS STARTS--}}
    @include('inc.svg')
{{--SVG ICONS ENDS--}}

</body>
</html>