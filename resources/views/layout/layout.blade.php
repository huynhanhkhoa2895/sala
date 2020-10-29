<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <title>Thiệp</title>
    <link href="{{asset("css/header.css")}}" rel="stylesheet" />
    @include("layout.css")
    @yield('css')
</head>
<body>
    <header>
        @include('layout.head')
    </header>
    <main>
        <div class="container-fluid">
            @yield('content')
        </div>
    </main>
    <footer>
        @include('layout.footer')
    </footer>
    @include("layout.script")
</body>

</html>