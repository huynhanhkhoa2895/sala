@extends('layout.layout')
@section('css')
    <link href="{{asset("css/compare.css")}}" rel="stylesheet" />
@endsection
@section('content')
<div class="compare-product">
    <div class="row" style="margin-bottom: 10px">
        <div class="col-12">
            <div class="compare-select">
                <select id="select-compare" class="form-control center-block" style="width : 250px;margin: auto">
                    <option value="0">--- Mời chọn sản phẩm</option>
                    @foreach($products as $_product)
                        <option value="{{$_product->id}}">{{$_product->name}}</option>
                    @endforeach
                </select>
            </div>
        </div>
    </div>
    <div class="row ">
        <div class="col-12 col-md-6">
            <div class="current-product">
                <div class="img-product">
                    <a href="{{url("thiep/".$product->slug)}}" id="product-img">
                        <img src="{{asset("img/product/".$product->image)}}" alt="{{$product->name}}" />
                    </a>
                    <div class="product-img-zoom-container" id="product-img-zoom-container"></div>
                </div>
                <div class="content-product">
                    <div class="product-name"><a href="{{url("thiep/".$product->slug)}}">{{$product->name}}</a></div>
                    <div class="product-price">{{number_format($product->price)}} VND</div>
                    <div class="product-style"><i>{{$product->style_name}}</i></div>
                </div>
            </div>
        </div>
        <div class="col-12 col-md-6">
            <div class="ajax-compare-product">

            </div>
        </div>
    </div>
</div>
@endsection
@push('js')
    <script src="{{asset("js/zoom/zoom.min.js")}}"></script>
    <script src="{{asset("js/compare-script.js")}}"></script>
    <script>
        let width = $(document).width();
        var options = {
            width: ($(document).width() > 500 ? 500 : width - 60), // required
            zoomContainer: document.getElementById("product-img-zoom-container"),
            // zoomPosition: 'left',
            zoomPosition: 'right',
        };
        new ImageZoom(document.getElementById("product-img"), options);
    </script>
@endpush