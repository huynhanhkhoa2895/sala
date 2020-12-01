@extends('layout.layout')
@section('css')
    <link href="{{asset("css/product.css")}}" rel="stylesheet" />
@endsection
@section('content')
    <div class="container">
        <div class="product-wrapper">
            @if (session('msg'))
                <div class="alert alert-success">{{session('msg')}}</div>
            @endif
            <div class="row">
                <div class="col-md-6 ">
                    <div class="product-img-container">
                        <div class="product-img" id="product-img">
                            <img src="{{asset("img/product/".$product->image)}}" alt="{{$product->name}}" />
                        </div>
                        <div class="product-img-zoom-container" id="product-img-zoom-container"></div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="product-content-container">
                        <div class="product-content-container-item">
                            <h4 class="product-name">{{$product->name}}</h4>
                            <div class="product-style">Loại thiệp: {{$product->style_name}}</div>
                        </div>
                        <div class="product-content-container-item">
                            <div id="price" data-price="{{$product->price}}" class="product-price">Đơn giá: <span>{{number_format($product->price)}} VND</span></div>
                            <div class="product-price">Tổng giá: <span id="sub_price" data-total="{{$product->price*$qty}}">{{number_format($product->price*$qty)}} VND</span></div>
                            <div class="product-update">
                                <div class="product-update-input-group input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" onclick="changeQty(this,'minus')"><span class="fas fa-minus"></span></span>
                                    </div>
                                    <input id="input-qty" type="text" class="form-control qty-input" value="{{$qty}}" onkeyup="InputQtyHandleChange()" />
                                    <div class="input-group-append">
                                        <span class="input-group-text" onclick="changeQty(this,'plus')"><span class="fas fa-plus"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="product-cart">
                                <a href="javascript:void(0)" onclick="addToCart({{$product->id}})"><span class="fas fa-shopping-cart"></span>Mua hàng</a>
                            </div>
                            <div class="pd0">
                                <a style="color: #c8ad5b;text-decoration: none" href="{{url("thiep/so-sanh/".$product->slug)}}" class="btn btn-link pdl0 font-weight-bold"><span class="fas fa-plus"></span> So Sánh Với Sản Phẩm Khác</a>
                            </div>
                            <div class="product-contact">
                                <div class="product-contact-info">
                                    <div>1. Giá áp dụng in 300 thiệp</div>
                                    <div>2. Giá chưa bao gồm in bản đồ.</div>
                                    <div>3. SL dưới 300 thiệp phụ thu 50k; Dưới 200 thiệp phụ thu 100k.</div>
                                    <p><a href="tel:0907000008">0907.000.008</a></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="product-list-same-style">
                <div class="row" >
                    <div class="col-12" >
                        <h3 style="border-bottom: 1px solid #c8ad5b;color : #c8ad5b;font-weight: 700">Những sản phẩm cùng loại</h3>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 pd0">
                        <div class="prodict-list-item">
                            @foreach ($products as $item)
                                <div class="prodict-list-item-box">
                                    <div id="box-img" class="box-img">
                                    <a href="{{url("thiep/".$item->slug)}}/#product-img">
                                            <img src="{{asset("img/product/".$item->image)}}" alt="{{$item->content}}" />
                                        </a>
                                    </div>
                                    <div class="box-info">
                                        <div class="product-name">{{$item->name}}</div>
                                        <div class="product-price">{{number_format($item->price)}} VND</div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('js')
    <script src="{{asset("js/zoom/zoom.min.js")}}"></script>
    <script>
        let width = $(document).width();
        var options = {
            width: ($(document).width() > 400 ? 400 : width-60), // required
            scale: 0.5,
            zoomWidth: 600,
            zoomContainer: document.getElementById("product-img-zoom-container"),
            // zoomPosition: 'left',
            zoomPosition: 'right',
        };
        new ImageZoom(document.getElementById("product-img"), options);
    </script>
@endpush

