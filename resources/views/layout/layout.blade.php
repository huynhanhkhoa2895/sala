<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="description" content="Thiệp cưới sala - cung cấp thiệp cưới rẻ và đẹp">
    <link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <title>Thiệp cưới sala</title>
    <link rel="preconnect" href="https://fonts.gstatic.com" />
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300&display=swap" rel="stylesheet" .>
    <link href="{{asset("css/snow.css")}}" rel="stylesheet" />
    <link href="{{asset("css/style.css")}}" rel="stylesheet" />
    <link href="{{asset("css/header.css")}}" rel="stylesheet" />
    <link href="{{asset("css/footer.css")}}" rel="stylesheet" />
    <link href="{{asset("css/home.css")}}" rel="stylesheet" />
    <!-- Google Tag Manager -->
<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','GTM-T22624W');</script>
<!-- End Google Tag Manager -->
    @include("layout.css")
    @yield('css')
</head>
<body>
<!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-T22624W"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->
    <section class="container-fluid">
        <header>
            @include('layout.head')
        </header>
        <main>
            @yield('carousel')
            @include('layout.menu')
            @yield('content')
        </main>
        <footer>
            @include('layout.footer')
        </footer>
    </section>
    <div class="background-snow">
        <div class="snow"></div>
    </div>
    <div class="background-icon">
        <div class="background-icon-item" onclick="scrollToTop()">
            <span class="fas fa-arrow-up fa-2x"></span>
        </div>
    </div>
    <div class="background-messenger">
        <a href="https://m.me/Thiepcuoisalahcm">
            <img src="{{asset("messenger.png")}}" alt="thiệp cưới sala" />
        </a>
    </div>
    <div class="background-messenger telephone">
        <a href="tel:0907000008">
            <img src="{{asset("phone.gif")}}" alt="thiệp cưới sala" />
        </a>
    </div>
    @include("layout.script")
</body>

</html>