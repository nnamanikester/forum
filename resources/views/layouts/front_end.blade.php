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
    <link rel="stylesheet" href="{{asset('css/fontawesome-free/css/all.min.css')}}">

    @yield('styles')

</head>
<body>

<!-- tt-mobile menu -->
@include('inc.nav')


{{--HEADER STARTS--}}
    @if(Auth::check())
        @include('inc.header_logged_in')
    @else
        @include('inc.header')
    @endif

{{--@yield('header')--}}
{{--HEADER ENDS--}}


{{--MAIN BODY CONTENT--}}
<main id="tt-pageContent" class="tt-offset-small">
    <div class="container">

        @yield('content')

    </div>
</main>

{{--SETTINGS STARTS HERE--}}

@if(Auth::check())

    @include('inc.settings')

@endif

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


<script src="{{asset('js/bundle.js')}}"></script>
<script src="{{asset('js/app.js')}}"></script>
<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script src="{{asset('tinymce/tinymce.min.js')}}"></script>
@yield('scripts')


@if(!empty(session('success')))
    {{--{{session('success')}}--}}
    <script>
        swal({
            title: "{{session('success')}}",
            icon: "success",
            button: "ok",
            timer: 3000,
        });

    </script>

@endif
@if(!empty(session('error')))
    {{--{{session('deleted')}}--}}
    <script>
        swal({
            title: "{{session('error')}}",
            icon: "error",
            button: "ok",
            timer: 3000,
        });

    </script>
@endif

{{--<script>--}}
{{--tinymce.init({--}}
{{--selector:'textarea',--}}
{{--height: 300--}}
{{--});--}}
{{--</script>--}}


<script>
    var editor_config = {
        path_absolute : "/",
        selector: "textarea",
        plugins: [
            "advlist autolink lists link image charmap print preview hr anchor pagebreak",
            "searchreplace wordcount visualblocks visualchars code fullscreen",
            "insertdatetime media nonbreaking save table contextmenu directionality",
            "emoticons template paste textcolor colorpicker textpattern"
        ],
        toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image media",
        relative_urls: false,
        file_browser_callback : function(field_name, url, type, win) {
            var x = window.innerWidth || document.documentElement.clientWidth || document.getElementsByTagName('body')[0].clientWidth;
            var y = window.innerHeight|| document.documentElement.clientHeight|| document.getElementsByTagName('body')[0].clientHeight;

            var cmsURL = editor_config.path_absolute + '/admin/media?field_name=' + field_name;
            if (type == 'image') {
                cmsURL = cmsURL + "&type=Images";
            } else {
                cmsURL = cmsURL + "&type=Files";
            }

            tinyMCE.activeEditor.windowManager.open({
                file : cmsURL,
                title : 'Filemanager',
                width : x * 0.8,
                height : y * 0.8,
                resizable : "yes",
                close_previous : "no"
            });
        }
    };

    tinymce.init(editor_config);
</script>


{{--SVG ICONS STARTS--}}
    @include('inc.svg')
{{--SVG ICONS ENDS--}}

</body>
</html>