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
            @foreach($product as $item)
                @php
                    $total += $item->price*$qtys[$item->id];
                    $totalQty += $qtys[$item->id];
                @endphp
                <div class="row">
                    <div class="col-12 ">
                        <a class="product-image" href="{{url("thiep/".$item->slug)}}">
                            <img src="{{asset("img/product/".$item->image)}}" alt="{{$item->name}}" />
                        </a>
                        <h3 class="text-center">{{$item->name}}</h3>
                    </div>
                </div>
            @endforeach
            <div class="row">
                <div class="col-12 text-center">
                    <b>Số lượng: </b> {{$totalQty}} thiệp
                </div>
                <div class="col-12 text-center">
                    <div class="total-price ">
                        <b>Phụ thu:</b>
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
                </div>
                <div class="col-12 text-center"><b>Tổng tiền:</b> {{number_format($total)}} VND</div>
            </div>
            <div class="row">
                <div class="col-12 text-center">
                    <p style="color: red"><i>* Nếu quý khách đặt dưới 300 thiệp sẽ phụ thu 50k</i></p>
                    <p style="color: red"><i>* Nếu quý khách đặt dưới 200 thiệp sẽ phụ thu 100k</i></p>
                </div>
            </div>
            <form action="{{route("post-checkout")}}" method="post">
                {{ csrf_field() }}
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <div class="row justify-content-md-center">
                    <div class="col-md-4 col-12">
                        <div class="form-group">
                            <label>Họ và Tên người nhận hàng <span class="red">*</span></label>
                            <input name="name" type="text" class="form-control" />
                        </div>
                        <div class="form-group">
                            <label >Số điện thoại người nhận hàng <span class="red">*</span></label>
                            <input name="phone" type="text" class="form-control" />
                        </div>
                        <div class="form-group">
                            <label >Địa chỉ nhận hàng <span class="red">*</span></label>
                            <input name="address" type="text" class="form-control" />
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 col-md-6">
                        <fieldset>
                            <legend>Nhà gái</legend>
                            <div class="form-group">
                                <label>Ông: <span class="red">*</span></label>
                                <input name="dad_girl" type="text" class="form-control" />
                            </div>
                            <div class="form-group">
                                <label >Bà: <span class="red">*</span></label>
                                <input name="mom_girl" type="text" class="form-control" />
                            </div>
                            <div class="form-group">
                                <label >Cô dâu: <span class="red">*</span></label>
                                <input name="girl" type="text" class="form-control" />
                            </div>
                            <div class="form-group">
                                <label >Địa chỉ <span class="red">*</span></label>
                                <input name="address_girl" type="text" class="form-control" />
                            </div>
                        </fieldset>
                    </div>
                    <div class="col-12 col-md-6">
                        <fieldset>
                            <legend>Nhà Trai</legend>
                            <div class="form-group">
                                <label>Ông: <span class="red">*</span></label>
                                <input name="dad_boy" type="text" class="form-control" />
                            </div>
                            <div class="form-group">
                                <label >Bà: <span class="red">*</span></label>
                                <input name="mom_boy" type="text" class="form-control" />
                            </div>
                            <div class="form-group">
                                <label >Chú rể: <span class="red">*</span></label>
                                <input name="boy" type="text" class="form-control" />
                            </div>
                            <div class="form-group">
                                <label >Địa chỉ: <span class="red">*</span></label>
                                <input name="address_boy" type="text" class="form-control" />
                            </div>
                        </fieldset>
                    </div>
                </div>
                <div class="row" style="padding-bottom: 10px">
                    <div class="col-12 text-right">
                        <button type="submit" class="btn btn-payment" href="{{url("cart/payment")}}">Đặt hàng</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

@endsection