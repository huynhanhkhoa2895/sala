@extends('layout.layout')
@section('css')
    <link href="{{asset("css/product.css")}}" rel="stylesheet" />
@endsection
@section('content')
    <div class="container">
        <div class="product-wrapper">
            <div class="row">
                <div class="col-md-6 ">
                    <div class="product-img-container">
                        <div class="product-img" id="product-img">
                            <img src="{{asset("img/product/".$product->image)}}" alt="{{$product->name}}" />
                        </div>
                        <div class="product-img-zoom-container" id="product-img-zoom-container">
                                
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="product-content-container">
                        <div class="product-content-container-item">
                            <h4 class="product-name">{{$product->name}}</h4>
                            <div class="product-style">Loại thiệp: {{$product->style_name}}</div>
                        </div>
                        <div class="product-content-container-item">
                            <div class="product-price">{{number_format($product->price)}} VND</div>
                            <div class="product-update">
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" onclick="changeQty('minus')"><span class="fas fa-minus"></span></span>
                                    </div>
                                    <input id="input-qty" type="text" class="form-control qty-input" value="1" readonly />
                                    <div class="input-group-append">
                                        <span class="input-group-text" onclick="changeQty('plus')"><span class="fas fa-plus"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="product-cart">
                                <a href="javascript:void(0)" onclick="addToCart({{$product->id}})"><span class="fas fa-shopping-cart"></span>Mua hàng</a>
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
        var options = {
            width: 400, // required
            scale: 0.5,
            // zoomWidth: 50,
            zoomContainer: document.getElementById("product-img-zoom-container"),
            // zoomPosition: 'left',
            zoomPosition: 'right',
        };
        new ImageZoom(document.getElementById("product-img"), options);
    </script>
@endpush

