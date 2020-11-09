@extends('layout.layout')
@section('css')
    <link href="{{asset("css/home.css")}}" rel="stylesheet" />
    <link href="{{asset("css/owl.carousel.min.css")}}" rel="stylesheet" />
    <link href="{{asset("css/owl.theme.default.min.css")}}" rel="stylesheet" />
    
@endsection
@section('content')
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
                    @foreach ($kind as $item)
                    <div class="row">
                        <div class="col">
                            <div class="product-list-kind-item">
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
                                        <select class="form-control">
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
                                        <select class="form-control">
                                            @foreach ($style as $item)
                                                <option value="{{$item->id}}">{{$item->content}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="prodict-list-item">
                        <div class="row">
                            @foreach ($product as $item)
                                <div class="col-lg-3 col-md-4 col-sm-6 col">
                                    <div class="prodict-list-item-box">
                                        <div class="box-img">
                                        <a href="{{url("thiep/".$item->slug)}}">
                                                <img src="{{asset("img/product/".$item->image)}}" alt="{{$item->content}}" />
                                            </a>
                                        </div>
                                        <div class="box-info">
                                            <div class="product-name">{{$item->name}}</div>
                                            <div class="product-price">{{number_format($item->price)}} VND</div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
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
                <div class="title text-center">
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
                    <div style="margin: 10px auto;max-width: 500px" class="input-group mb-3">
                        <input type="text" class="form-control sala-input" placeholder="Recipient's username" aria-label="Recipient's username" aria-describedby="basic-addon2">
                        <div class="input-group-append">
                            <span class="input-group-text bg-main" id="basic-addon2"><span class="fas fa-share color-w"></span></span>
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
        })
    </script>
@endpush