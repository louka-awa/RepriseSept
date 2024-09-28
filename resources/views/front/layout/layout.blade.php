<!DOCTYPE html>
<html class="no-js" lang="fr">

<head>
    <meta charset="UTF-8">
    <!--[if IE]>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <![endif]-->
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <meta name="description" content="">
    <meta name="author" content="">
    <title>@if(!empty($meta_title)){{ $meta_title }} @else Marché de biens et services en ligne au Congo-Brazzaville, Sois plus visible en ligne @endif</title>
    @if(!empty($meta_description))<meta name="description" content="{{ $meta_description }}">@endif

    @if(!empty($meta_keywords))<meta name="keywords" content="{{ $meta_keywords }}">@endif
    <!-- Favicon standard -->
    <link href="favicon.ico" rel="shortcut icon">
    <!-- Police Google de base pour l'application Web -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,700" rel="stylesheet">
    <!-- Polices Google pour les bannières uniquement -->
    <link href="https://fonts.googleapis.com/css?family=Raleway:400,800" rel="stylesheet">
    <!-- Bootstrap 4 -->
    <link rel="stylesheet" href="{{ url('front/css/bootstrap.min.css') }}">
    <!-- Font Awesome 5 -->
    <link rel="stylesheet" href="{{ url('front/css/fontawesome.min.css') }}">
    <!-- Ion-Icons 4 -->
    <link rel="stylesheet" href="{{ url('front/css/ionicons.min.css') }}">
    <!-- CSS animé -->
    <link rel="stylesheet" href="{{ url('front/css/animate.min.css') }}">
    <!-- Owl-Carousel -->
    <link rel="stylesheet" href="{{ url('front/css/owl.carousel.min.css') }}">
    <!-- Jquery-Ui-Range-Slider -->
    <link rel="stylesheet" href="{{ url('front/css/jquery-ui-range-slider.min.css') }}">
    <!-- Utilitaire -->
    <link rel="stylesheet" href="{{ url('front/css/utility.css') }}">
    <!-- Principal -->
    <link rel="stylesheet" href="{{ url('front/css/bundle.css') }}">
    <!-- Zoom -->
    <link rel="stylesheet" href="{{ url('front/css/easyzoom.css') }}">
    <!-- Personnalisé -->
    <link rel="stylesheet" href="{{ url('front/css/custom.css') }}">
</head>

<body>

    <!-- Script Google Translate -->
   <div id="google_translate_element"></div>
   <script type="text/javascript">
      function googleTranslateElementInit() {
         new google.translate.TranslateElement({
            pageLanguage: 'fr', layout:
            google.translate.TranslateElement.InlineLayout.HORIZONTAL, autoDisplay:
            false, includedLanguages: 'fr,en,de,es', gaTrack: true, gaId: 'AIzaSyDdMXtJJuAjvJdkVDNsSXVLmCSpwfH1GeU'
            }, 'google_translate_element');
      }
   </script>
   <script type="text/javascript" src="https://translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>

<div class="loader">
   <img src="{{ asset('front/images/loaders/loader.gif') }}" alt="Chargement..." />
</div>

<!-- app -->
<div id="app">
    @include('front.layout.header')
    @yield('content')
    @include('front.layout..footer')
    @include('front.layout.modals')
</div>
<!-- app /- -->
<!--[if lte IE 9]>
<div class="app-issue">
    <div class="vertical-center">
        <div class="text-center">
            <h1>Vous utilisez un navigateur obsolète.</h1>
            <span>Cette application Web n'est pas compatible avec le navigateur suivant. Veuillez mettre à jour votre navigateur pour améliorer votre sécurité et votre expérience.</span>
        </div>
    </div>
</div>
<style> #app {
    display: none;
} </style>
<![endif]-->
<!-- NoScript -->
<noscript>
    <div class="app-issue">
        <div class="vertical-center">
            <div class="text-center">
                <h1>JavaScript est désactivé dans votre navigateur.</h1>
                <span>Veuillez activer JavaScript dans votre navigateur ou passer à un navigateur compatible avec JavaScript.</span>
            </div>
        </div>
    </div>
    <style>
    #app {
        display: none;
    }
    </style>
</noscript>
<!-- Google Analytics: change UA-XXXXX-Y to be your site's ID. -->
<script>
window.ga = function() {
    ga.q.push(arguments)
};
ga.q = [];
ga.l = +new Date;
ga('create', 'UA-XXXXX-Y', 'auto');
ga('send', 'pageview')
</script>
<script src="https://www.google-analytics.com/analytics.js" async defer></script>
<!-- Modernizr-JS -->
<script type="text/javascript" src="{{ url('front/js/vendor/modernizr-custom.min.js') }}"></script>
<!-- NProgress -->
<script type="text/javascript" src="{{ url('front/js/nprogress.min.js') }}"></script>
<!-- jQuery -->
<script type="text/javascript" src="{{ url('front/js/jquery.min.js') }}"></script>
<!-- Bootstrap JS -->
<script type="text/javascript" src="{{ url('front/js/bootstrap.min.js') }}"></script>
<!-- Popper -->
<script type="text/javascript" src="{{ url('front/js/popper.min.js') }}"></script>
<!-- ScrollUp -->
<script type="text/javascript" src="{{ url('front/js/jquery.scrollUp.min.js') }}"></script>
<!-- Elevate Zoom -->
<script type="text/javascript" src="{{ url('front/js/jquery.elevatezoom.min.js') }}"></script>
<!-- jquery-ui-range-slider -->
<script type="text/javascript" src="{{ url('front/js/jquery-ui.range-slider.min.js') }}"></script>
<!-- jQuery Slim-Scroll -->
<script type="text/javascript" src="{{ url('front/js/jquery.slimscroll.min.js') }}"></script>
<!-- jQuery Resize-Select -->
<script type="text/javascript" src="{{ url('front/js/jquery.resize-select.min.js') }}"></script>
<!-- jQuery Custom Mega Menu -->
<script type="text/javascript" src="{{ url('front/js/jquery.custom-megamenu.min.js') }}"></script>
<!-- jQuery Countdown -->
<script type="text/javascript" src="{{ url('front/js/jquery.custom-countdown.min.js') }}"></script>
<!-- Owl Carousel -->
<script type="text/javascript" src="{{ url('front/js/owl.carousel.min.js') }}"></script>
<!-- Main -->
<script type="text/javascript" src="{{ url('front/js/app.js') }}"></script>
<!-- Custom -->
<script type="text/javascript" src="{{ url('front/js/custom.js') }}"></script>
<!-- Zoom -->
<script type="text/javascript" src="{{ url('front/js/easyzoom.js') }}"></script>
<script>
        // Instantiate EasyZoom instances
        var $easyzoom = $('.easyzoom').easyZoom();

        // Setup thumbnails example
        var api1 = $easyzoom.filter('.easyzoom--with-thumbnails').data('easyZoom');

        $('.thumbnails').on('click', 'a', function(e) {
            var $this = $(this);

            e.preventDefault();

            // Use EasyZoom's `swap` method
            api1.swap($this.data('standard'), $this.attr('href'));
        });

        // Setup toggles example
        var api2 = $easyzoom.filter('.easyzoom--with-toggle').data('easyZoom');

        $('.toggle').on('click', function() {
            var $this = $(this);

            if ($this.data("active") === true) {
                $this.text("Désactiver").data("active", false);
                api2.teardown();
            } else {
                $this.text("Activer").data("active", true);
                api2._init();
            }
        });
    </script>
@include('front.layout.scripts')

</body>
</html>
