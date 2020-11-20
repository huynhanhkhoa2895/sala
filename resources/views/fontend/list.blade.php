@extends('layout.layout')
@section('content')
    <div class="row">
        <div class="col-sm-5 col-md-4 col-lg-3 pd10">
            <x-list-style></x-list-style>
        </div>
        <div class="col-sm-7 col-md-8 col-lg-9 pd0">
            <div class="product-list">
                <div class="product-list-filter">
                    <div class="row" style="margin-bottom: 20px">
                        <div class="col-12 col-md" style="margin-bottom: 10px">
                            <div class="row">
                                <div class="col">
                                    <x-select-list-color></x-select-list-color>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-md" style="margin-bottom: 10px">
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
            <div class="product-paging">
                {{ $product->links() }}
            </div>
        </div>
    </div>
@endsection