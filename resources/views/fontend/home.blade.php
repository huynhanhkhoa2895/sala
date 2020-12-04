@extends('layout.layout')
@section('css')
    <link href="{{asset("css/owl.carousel.min.css")}}" rel="stylesheet" />
    <link href="{{asset("css/owl.theme.default.min.css")}}" rel="stylesheet" />
@endsection
@if (session('msg'))
    <div class="alert alert-success">{{session('msg')}}</div>
@endif
@section('carousel')
    <div class="carousel">
        <div class="row">
            <div class="col-12 pd0">
                <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                    <ol class="carousel-indicators">
                        @foreach ($banner as $k=>$item)
                            <li data-target="#carouselExampleIndicators" data-slide-to="{{$k}}" class="{{$k == 0 ? "active" : ""}}"></li>
                        @endforeach
                    </ol>
                    <div class="carousel-inner">
                        @foreach ($banner as $k=>$item)
                            <div class="carousel-item {{$k == 0 ? "active" : ""}}">
                                <img class="d-block w-100" src="{{asset("img/banner/".$item->img)}}" />
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('content')

    <div class="products">
        <div class="row">
            <div class="col-sm-12 col-md-4 col-lg-2 pd10">
                <x-list-style></x-list-style>
            </div>
            <div class="col-sm-7 col-md-8 col-lg-10 pd0">
                <div class="product-list">
                    <div class="product-list-filter">
                        <div class="row" style="margin-bottom: 20px">
                            <div class="col-12 col-md" style="margin-bottom: 10px">
                                <div class="row" >
                                    <div class="col">
                                        <x-select-list-color></x-select-list-color>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-md" style="margin-bottom: 10px">
                                <div class="row">
                                    <div class="col">
                                        <select id="select-list-style" class="form-control sala-input">
                                            <option value="0">Chọn kiểu</option>
                                            @foreach ($style as $item)
                                                <option value="{{$item->id}}">{{$item->content}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-md">
                                <div class="row">
                                    <div class="col">
                                        <x-select-list-price></x-select-list-price>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="prodict-list-item">
                        @foreach ($product as $item)
                            <div class="prodict-list-item-box">
                                <div class="box-img">
                                <a href="{{url("thiep/".$item->slug)}}/#product-img">
                                        <img src="{{asset("img/product/".$item->image)}}" alt="{{$item->content}}" />
                                    </a>
                                </div>
                                <div class="box-info">
                                    <div class="product-name">{{$item->name}}</div>
                                    <div class="product-price">{{number_format($item->price)}} VND</div>
                                    <div class="product-cart">
                                        <a href="{{url("thiep/".$item->slug)}}"><span class="fas fa-shopping-cart"></span>Mua hàng</a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div id="news" class="news">
        <div class="row">
            <div class="col-md-12 pd0">
                <div class="title text-center">TIN TỨC</div>
            </div>
        </div>
        <div class="row" style="padding: 10px">
            <div class="col-12">
                <div class="owl-carousel owl-theme">
                    @foreach($news as $new)
                        <div class="item">
                            <h4 class="title-news"><a href="{{url("news/".$new->slug)}}">{{$new->title}}</a></h4>
                            <div class="img-news">
                                <a href="{{url("news/".$new->slug)}}">
                                    <img src="{{asset("img/news/".$new->img)}}" alt="{{$new->title}}" />
                                </a>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    <div id="intro" class="intro">
        <div class="row">
            <div class="col-md-12">
                <div class="title text-center" style="font-family: mtd">
                    Xin Chào
                </div>
                <div class="content text-center">
                    <p>1. Giá áp dụng in 300 thiệp</p>
                    <p>2. Giá chưa bao gồm in bản đồ.</p>
                    <p>3. SL dưới 300 thiệp phụ thu 50k; Dưới 200 thiệp phụ thu 100k.</p>
                    <p><a href="tel:0907000008">0907.000.008</a></p>
                </div>
                <div class="contact text-center" id="contact">
                    <div>Nhập email hoặc số điện thoại để được tư vấn ngay</div>
                    <div class="send-success">
                        <div style="margin: 10px auto;max-width: 500px" class="input-group mb-3">
                            <input type="text" class="form-control sala-input" placeholder="Email hoặc số đt" aria-label="Email hoặc số đt" aria-describedby="basic-addon2">
                            <div class="input-group-append" onclick="handleClickSendEmailContact()">
                                <span class="input-group-text bg-main" id="basic-addon2"><span class="fas fa-share color-w"></span></span>
                            </div>
                        </div>
                        <div style="display : none" class="send-success-message">
                            <span>Chúng tôi sẽ sẽ liên lạc sớm với bạn</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="intro2">
        <div class="row">
            <div class="col-md col-12">
                <span class="fas fa-truck fa-3x"></span>
                <span class="text">Ship COD toàn quốc</span>
            </div>
            <div class="col-md col-12">
                <span class="fas fa-money-bill fa-3x"></span>
                <div class="text" style="width: 80px">Mẫu mã đa dạng</div>
            </div>
            <div class="col-md col-12">
                <span class="fas fa-smile fa-3x"></span>
                <span class="text">Hỗ trợ tư vấn 24/7</span>
            </div>
        </div>
    </div>
@endsection
@push('js')
    <script src="{{asset("js/owl.carousel.min.js")}}"></script>
    <script>
        $(document).ready(()=>{
            $('.owl-carousel').owlCarousel({
                loop:true,
                margin:10,
                nav:false,
                dots: true,
                responsiveClass:true,
                autoplay: true,
                responsive:{
                    0:{
                        items:1
                    },
                    600:{
                        items:3
                    },
                }
            })

        })
    </script>
@endpush