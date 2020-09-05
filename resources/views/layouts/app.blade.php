<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="keywords" content="trendstyle, trendstyle kraljevo, salon, frizerski salon, frizura, kosa, hair, hairdresser, hairdresser's shop">
		<meta name="description" content="Frizerski salon u centru Kraljeva">
		<meta name="distribution" content="Global">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Favicon -->
    <link rel="icon" type="image/png" sizes="32x32" href="img/trend_style.png">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'TrendStyle') }}</title>
    <!-- jQuerry-->
    <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/my.css') }}" rel="stylesheet">
    <!-- FontAwesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.0/css/all.css" integrity="sha384-lKuwvrZot6UHsBSfcMvOkWwlCMgc0TaWr+30HWe3a4ltaBwTZhyTEggF5tJv8tbt" crossorigin="anonymous">
    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Audiowide&display=swap" rel="stylesheet">
    <!-- Leaflet za mape njihov css -->
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.5.1/dist/leaflet.css"
    integrity="sha512-xwE/Az9zrjBIphAcBb3F6JVqxf46+CDLwfLMHloNu6KEQCAWi6HcDUbeOfBIptF7tcCzusKFjFw2yuvEpDL9wQ=="
    crossorigin=""/>
    <!-- Leoflet script -->
    <script src="https://unpkg.com/leaflet@1.5.1/dist/leaflet.js"
     integrity="sha512-GffPMF3RvMeYyc1LWMHtK8EbPv0iNZ8/oTtHPx9/cc2ILxQ+u905qIwdpULaqDkyBKgOaB57QTMg7ztg8Jm2Og=="
     crossorigin=""></script>
    <!-- Lightbox-->

</head>
<body>

    <div id="app">
        @include('inc.navbar')
        @include('inc.message')
          <main>
              @yield('content')
          </main>
          @include('inc.footer')
    </div>
<script type="text/javascript">

    var btn_strelica = $('#strelica');

    $(window).scroll(function() {
      if ($(window).scrollTop() > 300) {
        btn_strelica.addClass('show');
      } else {
        btn_strelica.removeClass('show');
      }
    });

    btn_strelica.on('click', function(e) {
      e.preventDefault();
      $('html, body').animate({scrollTop:0}, '6000');
    });

</script>
</body>
</html>
