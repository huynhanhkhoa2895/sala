<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
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
    
    @include("layout.css")
    @yield('css')
</head>
<body>
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
        <div class="background-icon-item" onclick="toogleMusic()">
            <span class="fas fa-volume-up fa-2x"></span>
            <audio id="music" controls autoplay style="display: none">
                <source src="{{asset("music.mp3")}}" type="audio/mpeg">
            </audio>
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