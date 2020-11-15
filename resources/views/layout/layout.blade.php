<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <title>Thiệp</title>
    <link href="{{asset("css/style.css")}}" rel="stylesheet" />
    <link href="{{asset("css/header.css")}}" rel="stylesheet" />
    <link href="{{asset("css/footer.css")}}" rel="stylesheet" />
    @include("layout.css")
    @yield('css')
</head>
<body>
    <section class="container-fluid">
        <header>
            @include('layout.head')
        </header>
        <main>
            @yield('content')
        </main>
        <footer>
            @include('layout.footer')
        </footer>
    </section>
    @include("layout.script")
</body>

</html>