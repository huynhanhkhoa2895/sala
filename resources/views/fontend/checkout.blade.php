@extends('layout.layout')
@section('css')
    <link href="{{asset("css/checkout.css")}}" rel="stylesheet" />
@endsection
@section('content')
    @php
        $total = 0;
        $totalQty = 0;
    @endphp
    <div class="row" style="padding-top: 10px">
        <div class="col-12">
            @if (session('msg'))
                <div class="alert alert-success">{{session('msg')}}</div>
            @endif
            <table class="table table-bordered table-hover table-checkout">
                <thead>
                    <tr>
                        <th class="text-center">Sản phẩm</th>
                        <th class="text-center">Đơn giá</th>
                        <th class="text-center">Số lượng</th>
                        <th class="text-center"></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($product as $item)
                        @php
                            $total += $item->price*$qtys[$item->id];
                            $totalQty += $qtys[$item->id];
                        @endphp
                        <tr>
                            <td>
                                <div class="table-product">
                                    <div class="table-product-img">
                                        <img src="{{asset("img/product/".$item->image)}}" alt="{{$item->name}}" />
                                    </div>
                                    <div class="table-product-name">
                                        <a href="{{url("thiep/".$item->slug)}}">{{$item->name}}</a>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <div class="text-center">
                                    {{number_format($item->price)}}
                                </div>
                            </td>
                            <td>
                                <div class="product-update">
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="product-update-input-group input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text" onclick="changeQty(this,'minus')"><span class="fas fa-minus"></span></span>
                                                </div>
                                                <input class="form-control qty-input" value="{{$qtys[$item->id]}}" />
                                                <div class="input-group-append">
                                                    <span class="input-group-text" onclick="changeQty(this,'plus')"><span class="fas fa-plus"></span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <button style="width: 100%" class="btn-payment" onclick="updateCart(this,{{$item->id}})">Cập nhật</button>
                                        </div>
                                    </div>
                                </div>
                            </td>
                            <td class="text-center">
                                <a href="{{url("cart/remove/product/".$item->id)}}" onclick="return confirm('Bạn có muốn xóa ?');"><span class="fas fa-trash"></span></a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
                <tfoot>
                    <tr>
                        <td colspan="3">
                            <div class="total-price">Phụ thu</div>
                        </td>
                        <td class="text-center">
                            <div class="total-price ">
                                @if($totalQty < 300 && $totalQty >= 200)
                                    @php $total += 50000 @endphp
                                    {{number_format(50000)}}
                                @elseif($totalQty < 200)
                                    @php $total += 100000 @endphp
                                    {{number_format(100000)}}
                                @else
                                    {{0}}
                                @endif
                            VND</div>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="3">
                            <div class="total-price">Tổng tiền</div>
                        </td>
                        <td class="text-center">
                            <div class="total-price ">{{number_format($total)}} VND</div>
                        </td>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>
    <div class="row" style="padding-bottom: 10px">
        <div class="col-12 text-right">
            <p style="color: red"><i>* Nếu quý khách đặt dưới 300 thiệp sẽ phụ thu 50k</i></p>
            <p style="color: red"><i>* Nếu quý khách đặt dưới 200 thiệp sẽ phụ thu 100k</i></p>
        </div>
    </div>
    <div class="row" style="padding-bottom: 10px">
        <div class="col-12 text-right">
            <a class="btn btn-payment" href="{{url("cart/payment")}}">Thanh toán</a>
        </div>
    </div>
@endsection