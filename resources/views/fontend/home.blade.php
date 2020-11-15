@extends('layout.layout')
@section('css')
    <link href="{{asset("css/home.css")}}" rel="stylesheet" />
    <link href="{{asset("css/owl.carousel.min.css")}}" rel="stylesheet" />
    <link href="{{asset("css/owl.theme.default.min.css")}}" rel="stylesheet" />
    
@endsection
@section('content')
    <div class="header-menu">
        <div class="row">
            <div class="col">
                TRANG CHỦ
            </div>
            <div class="col">
                GIỚI THIỆU
            </div>
            <div class="col">
                CÁC LOẠI THIỆP
            </div>
            <div class="col">
                TIN TỨC
            </div>
            <div class="col">
                LIÊN HỆ
            </div>
        </div>
    </div>
    <div class="products">
        <div class="row">
            <div class="col-sm-5 col-md-4 col-lg-3 pd0">
                <div class="product-list-kind">
                    <div class="row" style="margin-bottom: 20px">
                        <div class="col">
                            <div class="product-list-kind-header">
                                DANH MỤC SẢN PHẨM
                            </div>
                        </div>
                    </div>
                    @foreach ($style as $item)
                    <div class="row">
                        <div class="col">
                            <div class="product-list-kind-item no-bg" style="background-image: url({{asset("img/style/".$item->img)}});background-size: cover;background-position: center;">
                                <a href={{url("danh-muc/".$item->id)}}>{{$item->content}}</a>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
            <div class="col-sm-7 col-md-8 col-lg-9 pd0">
                <div class="product-list">
                    <div class="product-list-filter">
                        <div class="row" style="margin-bottom: 20px">
                            <div class="col">
                                <div class="row">
                                    <div class="col">
                                        <select class="form-control sala-input">
                                            <option value="0">Chọn màu</option>
                                            @foreach ($color as $item)
                                                <option value="{{$item->id}}">{{$item->content}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="row">
                                    <div class="col">
                                        <select class="form-control sala-input">
                                            <option value="0">Chọn kiểu</option>
                                            @foreach ($style as $item)
                                                <option value="{{$item->id}}">{{$item->content}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="row">
                                    <div class="col">
                                        <select class="form-control sala-input">
                                            <option value="0">Chọn giá</option>
                                            <option value="1500">Thiệp cưới giá 1.500</option>
                                            <option value="1800">Thiệp cưới giá 1.800</option>
                                            <option value="1900">Thiệp cưới giá 1.900</option>
                                            <option value="2400">Thiệp cưới giá 2.400</option>
                                            <option value="2500">Thiệp cưới giá 2.500</option>
                                            <option value="asc">Thấp tới cao</option>
                                            <option value="desc">Cao tới thấp</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="prodict-list-item">
                        @foreach ($product as $item)
                            <div class="prodict-list-item-box">
                                <div class="box-img">
                                <a href="{{url("thiep/".$item->slug)}}">
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
    <div class="news">
        <div class="row">
            <div class="col-md-12 pd0">
                <div class="title text-center">TIN TỨC</div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="owl-carousel owl-theme">
                    <div class="item"><h4>Tin tức 1</h4></div>
                    <div class="item"><h4>Tin tức 2</h4></div>
                    <div class="item"><h4>Tin tức 3</h4></div>
                    <div class="item"><h4>Tin tức 4</h4></div>
                    <div class="item"><h4>Tin tức 5</h4></div>
                    <div class="item"><h4>Tin tức 6</h4></div>
                    <div class="item"><h4>Tin tức 7</h4></div>
                    <div class="item"><h4>Tin tức 8</h4></div>
                </div>
            </div>
        </div>
    </div>
    <div class="intro">
        <div class="row">
            <div class="col-md-12">
                <div class="title text-center" style="font-family: mtd">
                    Xin Chào
                </div>
                <div class="content text-center">
                    <p>Giá bao gồm in 1 nội dung với số lượng từ 300 trở lên</p>
                    <p>Số lượng ít hơn hoặc chia tách nhỏ số lượng sẽ tính phí</p>
                    <p>Số lượng dưới 200, vui lòng liên hệ Zalo</p>
                    <p>Giá chưa bao gồm bản đồ</p>
                    <p>Thời gian in: 8-10 ngày (Tùy mẫu)</p>
                    <p>Không in được: hình CDCR, tiếng hoa và mẫu thiết kế riêng</p>
                </div>
                <div class="contact text-center">
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
            <div class="col">
                <span class="fas fa-truck fa-3x"></span>
                <span class="text">Ship code toàn quốc</span>
            </div>
            <div class="col">
                <span class="fas fa-money-bill fa-3x"></span>
                <span class="text">Mẫu mã đa dạng</span>
            </div>
            <div class="col">
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
                responsive:{
                    0:{
                        items:1
                    },
                    600:{
                        items:3
                    },
                    1000:{
                        items:5
                    }
                }
            })
            $('.product-list-kind-item').on("mouseenter",function(){
                if($(this).hasClass("no-bg")){
                    $(this).removeClass("no-bg");
                }
            })
            $('.product-list-kind-item').on("mouseleave",function(){
                if(!$(this).hasClass("no-bg")){
                    $(this).addClass("no-bg");
                }
            })
        })
    </script>
@endpush